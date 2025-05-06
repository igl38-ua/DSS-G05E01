<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Asistencia del mes - Versión segura
        $attendanceData = $user->reservasThisMonth()
            ->get()
            ->groupBy(function($reserva) {
                return optional($reserva->fecha)->format('d') ?? '00';
            })
            ->map(function($group, $dia) {
                return [
                    'day' => $dia === '00' ? 0 : (int)$dia,
                    'total' => $group->count()
                ];
            })
            ->values();

        // 2. Suscripción activa
        $currentSubscription = $user->suscripcionActual()->first();

        // 3. Próximas clases (hasta 6) - Versión segura
        $upcomingClasses = $user->upcomingClassesQuery()
            ->with(['clase' => function($query) {
                $query->select('id', 'nombre', 'instructor', 'horario');
            }])
            ->whereNotNull('fecha')
            ->where('fecha', '>=', Carbon::today())
            ->orderBy('fecha')
            ->take(6)
            ->get();

            // En el controlador
            $recentClasses = $user->reservas()
        ->with(['clase' => function($query) {
            $query->select('id', 'nombre', 'instructor');
        }])
        ->whereNotNull('fecha') // Filtra reservas sin fecha
        ->whereHas('clase') // Filtra reservas sin clase asociada
        ->orderBy('fecha', 'desc')
        ->take(3)
        ->get();

        // 5. Objetivo mensual
        $monthlyGoal = $user->monthly_goal ?? 0;
        $completedClasses = $user->reservasThisMonth()->count();
        $progressPercentage = $monthlyGoal
            ? min(round($completedClasses/$monthlyGoal*100, 2), 100)
            : 0;

        return view('dashboard', [
            'attendanceData' => $attendanceData,
            'currentSubscription' => $currentSubscription,
            'upcomingClasses' => $upcomingClasses,
            'recentClasses' => $recentClasses,
            'monthlyGoal' => $monthlyGoal,
            'completedClasses' => $completedClasses,
            'progressPercentage' => $progressPercentage,
        ]);
    }

    public function suscripcionUsuario()
    {
        $sub = Auth::user()->suscripcionActual()->first();
        return view('suscripcionUsuario', compact('sub'));
    }
}