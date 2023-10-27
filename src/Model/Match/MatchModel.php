<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Match;


use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

final class MatchModel implements MatchModelInterface
{
    protected \DateTimeInterface $createdAt;

    protected function __construct(
        protected TeamModelInterface $homeTeam,
        protected TeamModelInterface $awayTeam,
        protected int $homeTeamScore = 0,
        protected int $awayTeamScore = 0,
    ) {
        $this->createdAt = new \DateTime('now');
    }

    public static function create(TeamModelInterface $homeTeam, TeamModelInterface $awayTeam): self
    {
        return new self(
            homeTeam: $homeTeam,
            awayTeam: $awayTeam,
        );
    }

    public function getAwayTeam(): TeamModelInterface
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(TeamModelInterface $team): void
    {
        $this->awayTeam = $team;
    }

    public function getAwayTeamScore(): int
    {
        return $this->awayTeamScore;
    }

    public function setAwayTeamScore(int $score): void
    {
        $this->awayTeamScore = $score;
    }

    public function getHomeTeam(): TeamModelInterface
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(TeamModelInterface $team): void
    {
        $this->homeTeam = $team;
    }

    public function getHomeTeamScore(): int
    {
        return $this->homeTeamScore;
    }

    public function setHomeTeamScore(int $score): void
    {
        $this->homeTeamScore = $score;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
}
