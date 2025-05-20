<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatbotResolver;

class ChatbotController extends Controller
{
    protected $resolver;

    public function __construct(ChatbotResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function handle(Request $request)
    {
        $input   = $request->input('message', '');
        $resolved = app(\App\Services\ChatbotResolver::class)->resolve($input);

        if ($resolved) {
            return response()->json([
                'type' => 'redirect',
                'url'  => route($resolved['route'], $resolved['params']),
            ]);
        }

        return response()->json([
            'type'    => 'text',
            'message' => 'Lo siento, no he entendido. ¿A dónde quieres ir?',
        ]);
    }
}