<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Team\Interface;

interface TeamModelInterface extends TeamNameMethodsInterface
{
    public static function create(string $name): self;
}
