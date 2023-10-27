<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Interface\CreatedAtInterface;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

interface MatchModelInterface extends
    MatchHomeTeamMethodsInterface,
    MatchHomeTeamScoreMethodsInterface,
    MatchAwayTeamMethodsInterface,
    MatchAwayTeamScoreMethodsInterface,
    CreatedAtInterface
{
    public static function create(TeamModelInterface $homeTeam, TeamModelInterface $awayTeam): self;
}
