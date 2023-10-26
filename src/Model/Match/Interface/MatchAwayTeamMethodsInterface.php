<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

interface MatchAwayTeamMethodsInterface
{
    public function getAwayTeam(): TeamModelInterface;
    public function setAwayTeam(TeamModelInterface $team): void;
}
