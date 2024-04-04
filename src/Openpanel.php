<?php

namespace Bleckert\OpenpanelLaravel;

use Carbon\Carbon;

class Openpanel extends HttpClient
{
    public ?string $profileId = null;

    public function setProfileId(string|int $id): void
    {
        $this->profileId = (string) $id;
    }

    public function setProfile(
        string|int $id,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $avatar = null,
        ?array $properties = null,
    ): void {
        $this->setProfileId($id);

        $this->post('profile', [
            'profileId' => $this->profileId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'avatar' => $avatar,
            'properties' => $properties,
        ]);
    }

    public function event(string $name, array $properties = [], ?string $timestamp = null): void
    {
        $timestamp = $timestamp ?? Carbon::now()->toIso8601String();
        $profileId = match (true) {
            isset($properties['profileId']) => $properties['profileId'],
            isset($properties['userId']) => $properties['userId'],
            default => $this->profileId,
        };

        $this->post('event', [
            'name' => $name,
            'properties' => $properties,
            'timestamp' => $timestamp,
            'profileId' => $profileId,
        ]);
    }
}
