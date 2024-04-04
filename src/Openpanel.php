<?php

namespace Bleckert\OpenpanelLaravel;

use Carbon\Carbon;

class Openpanel extends HttpClient
{
    public function event(string $name, array $properties = [], ?string $timestamp = null): void
    {
        $timestamp = $timestamp ?? Carbon::now()->toIso8601String();

        $this->post('event', [
            'name' => $name,
            'properties' => $properties,
            'timestamp' => $timestamp,
        ]);
    }
}
