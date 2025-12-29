<?php

namespace Bleckert\OpenpanelLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void track(string $name, ?array $properties = [], ?string $timestamp = null)
 * @method static void setProfileId(string|int $id)
 * @method static void identify(string|int $id, ?string $firstName = null, ?string $lastName = null, ?string $email = null, ?string $avatar = null, ?array $properties = null)
 * @method static void event(string $name, ?array $properties = [], ?string $timestamp = null)
 * @method static void increment(string $property, int $value = 1, array $options = [])
 * @method static void decrement(string $property, int $value = 1, array $options = [])
 *
 * @see \Bleckert\OpenpanelLaravel\Openpanel
 */
class Openpanel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Bleckert\OpenpanelLaravel\Openpanel::class;
    }
}
