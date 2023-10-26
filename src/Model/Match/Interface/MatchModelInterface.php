<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

interface MatchModelInterface extends
    MatchHomeTeamMethodsInterface,
    MatchHomeTeamScoreMethodsInterface,
    MatchAwayTeamMethodsInterface,
    MatchAwayTeamScoreMethodsInterface
{
    public static function create(TeamModelInterface $homeTeam, TeamModelInterface $awayTeam): self;
}
