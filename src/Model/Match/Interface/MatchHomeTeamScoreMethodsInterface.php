<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

interface MatchHomeTeamScoreMethodsInterface
{
    public function getHomeTeamScore(): int;
    public function setHomeTeamScore(int $score): void;
}
