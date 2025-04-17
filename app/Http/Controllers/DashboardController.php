<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Chart de asistencia: número de reservas cada día  
        $attendanceData = $user->reservasThisMonth()
            ->with('fecha')
            ->get()
            ->groupBy(fn($r) => $r->fecha->dia)
            ->map(fn($group, $dia) => ['day'=>$dia, 'total'=>$group->count()])
            ->values();

        // 2. Suscripción activa
        $currentSub = $user->suscripcionActual()->first();

        // 3. Próximas clases
        $upcomingClasses = $user->upcomingClasses();

        // 4. Cálculo de objetivo mensual
        $monthlyGoal       = $user->monthly_goal ?? 0;
        $completedClasses  = $user->reservasThisMonth()->count();
        $progressPercentage = $monthlyGoal > 0
            ? round($completedClasses / $monthlyGoal * 100, 2)
            : 0;

        return view('dashboard', [
            'attendanceData'    => $attendanceData,
            'currentSubscription' => $currentSub,
            'upcomingClasses'   => $upcomingClasses,
            'monthlyGoal'       => $monthlyGoal,
            'completedClasses'  => $completedClasses,
            'progressPercentage'=> $progressPercentage,
        ]);
    }

    public function suscripcionUsuario()
    {
        $sub = Auth::user()->suscripcionActual()->first();
        return view('suscripcionUsuario', compact('sub'));
    }
}
