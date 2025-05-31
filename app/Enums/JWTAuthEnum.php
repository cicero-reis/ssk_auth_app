<?php

namespace App\Enums;

class JWTAuthEnum
{
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_OK = 200;
    public const HTTP_SERVER_ERROR = 500;

    public const TOKEN_INVALID_MSG = 'Token inválido para renovação';

    public const ERROR_TOKEN_BLACKLISTED = 'Este token já foi utilizado ou invalidado';
    public const ERROR_TOKEN_EXPIRED = 'O token expirou e não pode mais ser renovado';
    public const ERROR_TOKEN_INVALID = 'O token fornecido é inválido';
    public const ERROR_TOKEN_PROCESSING = 'Erro ao processar o token';

    public static function getErrorMessage(): array
    {
        return [
            'HTTP_UNAUTHORIZED' => self::HTTP_UNAUTHORIZED,
            'HTTP_OK' => self::HTTP_OK,
            'HTTP_SERVER_ERROR' => self::HTTP_SERVER_ERROR,
            'TOKEN_INVALID_MSG' => self::TOKEN_INVALID_MSG,
            'ERROR_TOKEN_BLACKLISTED' => self::ERROR_TOKEN_BLACKLISTED,
            'ERROR_TOKEN_EXPIRED' => self::ERROR_TOKEN_EXPIRED,
            'ERROR_TOKEN_INVALID' => self::ERROR_TOKEN_INVALID,
            'ERROR_TOKEN_PROCESSING' => self::ERROR_TOKEN_PROCESSING,
        ];
    }
}
