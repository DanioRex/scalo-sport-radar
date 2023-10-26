<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Team\Interface;

interface TeamNameMethodsInterface
{
    public function getName(): string;
    public function setName(string $name): void;
}
