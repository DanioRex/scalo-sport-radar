<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match\Interface;

interface MatchAwayTeamScoreMethodsInterface
{
    public function getAwayTeamScore(): int;
    public function setAwayTeamScore(int $score): void;
}
