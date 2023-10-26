<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Collection\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;

interface MatchCollectionAddInterface
{
    public function add(MatchModelInterface $match): self;
}
