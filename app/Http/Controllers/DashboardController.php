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

        // 1. Asistencia del mes
        $attendanceData = $user->reservasThisMonth()
            ->get()
            ->groupBy(fn($reserva) => $reserva->fecha->format('d'))
            ->map(fn($group, $dia) => [
                'day'   => (int) $dia,
                'total' => $group->count(),
            ])
            ->values();

        // 2. Suscripción activa
        $currentSubscription = $user->suscripcionActual()->first();

        // 3. Próximas clases (hasta 6) devolvemos modelos Reserva
        $upcomingClasses = $user->reservas()
            ->with('clase:id,nombre,instructor,horario')
            ->whereNotNull('fecha')
            ->whereDate('fecha', '>=', Carbon::today())
            ->orderBy('fecha')
            ->take(6)
            ->get();

        // 4. Clases recientes (hasta 3)
        $recentClasses = $user->reservas()
            ->with('clase:id,nombre,instructor')
            ->whereNotNull('fecha')
            ->whereDate('fecha', '<', Carbon::today())
            ->orderBy('fecha', 'desc')
            ->take(3)
            ->get();

        // 5. Objetivo mensual
        $completedClasses = $user->reservasThisMonth()->count();

        $monthlyGoal = $user->objetivoMes->target ?? 0;

        $progressPercentage = $monthlyGoal > 0
            ? min(round($completedClasses / $monthlyGoal * 100, 2), 100)
            : 0;

        return view('dashboard', compact(
            'attendanceData',
            'currentSubscription',
            'upcomingClasses',
            'recentClasses',
            'completedClasses',
            'monthlyGoal',
            'progressPercentage'
        ));
    }

    public function suscripcionUsuario()
    {
        $sub = Auth::user()->suscripcionActual()->first();
        return view('suscripcionUsuario', compact('sub'));
    }
}
