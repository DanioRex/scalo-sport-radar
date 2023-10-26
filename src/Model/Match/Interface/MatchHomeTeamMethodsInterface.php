<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

interface MatchHomeTeamMethodsInterface
{
    public function getHomeTeam(): TeamModelInterface;
    public function setHomeTeam(TeamModelInterface $team): void;
}
