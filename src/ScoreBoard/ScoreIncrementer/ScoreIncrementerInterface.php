<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\ScoreBoard\ScoreIncrementer;

use DanioRex\ScaloSportRadar\Enum\TeamEnum;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;

interface ScoreIncrementerInterface
{
    public function incrementScore(MatchModelInterface $matchModel, TeamEnum $team): void;
}
