<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // 1. Asistencia del mes
    $attendanceData = $user->reservasThisMonth()
        ->with('fecha')
        ->get()
        ->groupBy(fn($r) => $r->fecha->dia)
        ->map(fn($group, $dia) => ['day'=>$dia,'total'=>$group->count()])
        ->values();

    // 2. Suscripción activa
    $currentSubscription = $user->suscripcionActual()->first();

    // 3. Próximas clases (hasta 6)
    $upcomingClasses = $user->upcomingClassesQuery()
                            ->take(6)
                            ->get();

    // 4. Clases recientes: últimas 3 reservas
    $recentClasses = $user->reservas()
                          ->with(['clase','fecha'])
                          ->orderBy('fecha','desc')
                          ->take(3)
                          ->get();

    // 5. Objetivo mensual
    $monthlyGoal       = $user->monthly_goal ?? 0;
    $completedClasses  = $user->reservasThisMonth()->count();
    $progressPercentage = $monthlyGoal
        ? round($completedClasses/$monthlyGoal*100,2)
        : 0;

    return view('dashboard', [
        'attendanceData'     => $attendanceData,
        'currentSubscription'=> $currentSubscription,
        'upcomingClasses'    => $upcomingClasses,
        'recentClasses'      => $recentClasses,
        'monthlyGoal'        => $monthlyGoal,
        'completedClasses'   => $completedClasses,
        'progressPercentage' => $progressPercentage,
    ]);
}


    public function suscripcionUsuario()
    {
        $sub = Auth::user()->suscripcionActual()->first();
        return view('suscripcionUsuario', compact('sub'));
    }
}
