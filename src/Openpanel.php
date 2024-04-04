<?php

namespace Bleckert\OpenpanelLaravel;

use Carbon\Carbon;

class Openpanel extends HttpClient
{
    public ?string $profileId = null;

    protected function getProfileId(array $options = []): ?string
    {
        return match (true) {
            isset($options['profileId']) => $options['profileId'],
            isset($options['userId']) => $options['userId'],
            default => $this->profileId,
        };
    }

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
        $profileId = $this->getProfileId($properties);

        $this->post('event', [
            'name' => $name,
            'properties' => $properties,
            'timestamp' => $timestamp,
            'profileId' => $profileId,
        ]);
    }

    /**
     * @throws MissingProfileIdException
     */
    public function increment(string $property, int $value = 1, array $options = []): void
    {
        $profileId = $this->getProfileId($options);

        if (!$profileId) {
            throw new MissingProfileIdException;
        }

        $this->post('profile/increment', [
            'profileId' => $profileId,
            'property' => $property,
            'value' => $value,
        ]);
    }

    /**
     * @throws MissingProfileIdException
     */
    public function decrement(string $property, int $value = 1, array $options = []): void
    {
        $profileId = $this->getProfileId($options);

        if (!$profileId) {
            throw new MissingProfileIdException;
        }

        $this->post('profile/decrement', [
            'profileId' => $profileId,
            'property' => $property,
            'value' => $value,
        ]);
    }
}
