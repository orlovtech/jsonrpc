<?php

namespace Tochka\JsonRpc\Facades;

use Illuminate\Support\Facades\Facade;
use Tochka\JsonRpc\Contracts\GlobalCustomCasterInterface;

/**
 * @method static mixed cast(string $casterName, string $className, $value, string $fieldName)
 * @method static void addCaster(GlobalCustomCasterInterface $caster)
 * @method static string|null getCasterForClass(string $className)
 * @see \Tochka\JsonRpc\Support\JsonRpcRequestCast
 */
class JsonRpcRequestCast extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return self::class;
    }
}
