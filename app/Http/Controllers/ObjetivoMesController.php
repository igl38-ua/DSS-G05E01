<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoMesController extends Controller
{
    public function edit()
    {
        $objetivo = auth()->user()->objetivo_mes;
        return view('objetivos.edit', compact('objetivo'));
    }


    public function update(Request $request)
    {
        $data = $request->validate([
            'target' => 'required|integer|min:0',
        ]);

        // usa el método relación que acabas de definir
        Auth::user()
            ->objetivoMes()
            ->updateOrCreate(
                [],
                ['target' => $data['target']]
            );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Objetivo del mes actualizado');
    }

}
