<?php
// app/Services/FakePaymentGateway.php

namespace App\Services;

class PaymentGateway
{
    /**
     * Simula un cargo y siempre devuelve éxito.
     */
    public function charge(array $data): array
    {
        return [
            'status'         => 'success',
            'transaction_id' => 'SMF-' . strtoupper(bin2hex(random_bytes(4))),
            'raw_response'   => $data, // opcional para ver qué se pasó
        ];
    }
}
