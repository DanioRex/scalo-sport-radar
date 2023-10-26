<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\ScoreBoard\Initializer;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

interface MatchInitializerInterface
{
    public function initGame(TeamModelInterface $homeTeam, TeamModelInterface $awayTeam): MatchModelInterface;
}
