<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validar email
        $request->validate(['email' => 'required|email']);

        // Intentar enviar el link de restablecimiento
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Devolver respuesta según el status
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);

        return redirect()
            ->route('login')
            ->with('status', __($status));

    }
}
