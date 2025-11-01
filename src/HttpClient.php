<?php

namespace Bleckert\OpenpanelLaravel;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function post(string $path, array $data): void
    {
        app()->terminating(function () use ($path, $data) {
            $url = config('openpanel.url').'/'.$path;
            $clientId = config('openpanel.client_id');
            $clientSecret = config('openpanel.client_secret');

            try {
                Http::timeout(5)
                    ->retry(
                        times: 3,
                        sleepMilliseconds: 100,
                        throw: false,
                    )
                    ->send('POST', $url, [
                        'body' => json_encode($data),
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'openpanel-client-id' => $clientId,
                            'openpanel-client-secret' => $clientSecret,
                        ],
                    ]);
            } catch (ConnectionException $e) {
                // ignore connection errors
            }
        });
    }
}
