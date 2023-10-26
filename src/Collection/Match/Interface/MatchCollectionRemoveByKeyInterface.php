<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Collection\Match\Interface;

interface MatchCollectionRemoveByKeyInterface
{
    public function removeByKey(string $key): bool;
}
