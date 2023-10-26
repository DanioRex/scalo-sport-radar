<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\ScoreBoard\Lister;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionInterface;

interface MatchListerInterface
{
    public function listMatches(): MatchCollectionInterface;
}
