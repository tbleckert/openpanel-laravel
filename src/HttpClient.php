<?php

namespace Bleckert\OpenpanelLaravel;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function post(string $path, array $data): void
    {
        app()->terminating(function () use ($path, $data) {
            $url = config('openpanel.url').'/'.$path;
            $clientId = config('openpanel.client_id');
            $clientSecret = config('openpanel.client_secret');

            Http::send('POST', $url, [
                'body' => json_encode($data),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'openpanel-client-id' => $clientId,
                    'openpanel-client-secret' => $clientSecret,
                ],
            ]);
        });
    }
}
