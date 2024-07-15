<?php

namespace Tochka\JsonRpc\Facades;

use Illuminate\Support\Facades\Facade;
use Tochka\JsonRpc\Support\ResponseCollection;

/**
 * JsonRpc Server
 * @method static ResponseCollection handle(string $request, string $serverName = 'default', string $group = null,string $action = null)
 *
 * @see \Tochka\JsonRpc\JsonRpcServer
 */
class JsonRpcServer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return self::class;
    }
}
