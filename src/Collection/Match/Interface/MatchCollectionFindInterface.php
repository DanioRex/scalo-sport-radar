<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Collection\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;

interface MatchCollectionFindInterface
{
    public function find(MatchModelInterface $matchModel): ?MatchModelInterface;
}
