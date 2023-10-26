<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\ScoreBoard\Finalizer;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;

interface MatchFinalizerInterface
{
    public function finishGame(MatchModelInterface $match): bool;
}
