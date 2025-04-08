<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaypalController extends Controller
{
    public function createPaypalOrder(Request $request)
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $secret = env('PAYPAL_SECRET');

        // Validar los datos recibidos desde el formulario
        $validated = $request->validate([
            'price' => 'required|numeric|min:0.5',
            'currency' => 'nullable|string|size:3'
        ]);

        $price = $validated['price'];
        $currency = strtoupper($validated['currency'] ?? 'MXN');

        // Autenticarse con PayPal para obtener el token
        $response = Http::withBasicAuth($clientId, $secret)
            ->asForm()
            ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

        if (!$response->ok()) {
            return response()->json(['error' => 'Error al autenticar con PayPal'], 500);
        }

        $accessToken = $response['access_token'];

        // Crear la orden en PayPal
        $order = Http::withToken($accessToken)
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => $currency,
                        'value' => number_format($price, 2, '.', '')
                    ]
                ]],
                'application_context' => [
                    'return_url' => url('/paypal/success'),
                    'cancel_url' => url('/paypal/cancel'),
                ]
            ]);

        if (!$order->ok()) {
            return response()->json(['error' => 'Error al crear la orden'], 500);
        }

        // Obtener el enlace de aprobación para redirigir al usuario a PayPal
        $approvalLink = collect($order['links'])->firstWhere('rel', 'approve')['href'] ?? null;

        if ($approvalLink) {
            // Redirigir a PayPal para que el usuario pueda aprobar el pago
            return redirect()->to($approvalLink);
        }

        return response()->json(['error' => 'Error al obtener el enlace de aprobación'], 500);
    }

    public function paypalSuccess(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado'], 400);
        }

        $accessToken = $this->getAccessToken();

        // Capturar el pago después de la aprobación
        $capture = Http::withToken($accessToken)
            ->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/$token/capture");

        if ($capture->successful() && $capture['status'] === 'COMPLETED') {
            // Aquí puedes actualizar el estado de la compra del cómic, por ejemplo
            // Comic::where('id', $comicId)->update(['status' => 'comprado']);

            return redirect()->route('comic.success', ['order_id' => $capture['id']]);
        }

        return response()->json(['error' => 'Error al capturar el pago ❌'], 500);
    }

    public function paypalCancel()
    {
        return response()->json(['message' => 'El pago fue cancelado por el usuario.']);
    }

    // Función privada para obtener el token de acceso
    private function getAccessToken()
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $secret = env('PAYPAL_SECRET');

        $response = Http::withBasicAuth($clientId, $secret)
            ->asForm()
            ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

        return $response['access_token'];
    }
}
