<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Exception;

class MatchNotFoundException extends \Exception
{
    public const MESSAGE = 'exception.match.not.found';

    public function __construct()
    {
        parent::__construct(
            message: self::MESSAGE,
            code: 404,
        );
    }
}
