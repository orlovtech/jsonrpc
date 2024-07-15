<?php

namespace Tochka\JsonRpc\Casters;

use Tochka\JsonRpc\Contracts\GlobalCustomCasterInterface;
use Tochka\JsonRpc\Exceptions\JsonRpcException;
use Tochka\JsonRpc\Exceptions\JsonRpcInvalidParameterException;

class BackedEnumCaster implements GlobalCustomCasterInterface
{
    public function canCast(string $expectedType): bool
    {
        return is_subclass_of($expectedType, '\BackedEnum');
    }
    
    /**
     * @throws JsonRpcException
     */
    public function cast(string $expectedType, $value, string $fieldName): mixed
    {
        if ($value === null) {
            return null;
        }
        
        try {
            /** @var \BackedEnum $expectedType */
            return $expectedType::from($value);
        } catch (\ValueError $e) {
            throw new JsonRpcInvalidParameterException(
                'incorrect_value',
                sprintf(
                    'Invalid value for field. Expected: [%s], Actual: [%s]',
                    implode(',', array_map(fn($enum) => (string) $enum->value, $expectedType::cases())),
                    $value
                ),
                $fieldName
            );
        }
    }
}
