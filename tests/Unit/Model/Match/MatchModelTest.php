<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\MatchModel;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use PHPUnit\Framework\TestCase;

final class MatchModelTest extends TestCase
{
    public function testCreateModelMethod(): void
    {
        $homeTeam = $this->createMock(TeamModelInterface::class);
        $awayTeam = $this->createMock(TeamModelInterface::class);

        $match = MatchModel::create($homeTeam, $awayTeam);

        $this->assertIsObject($match);

        $this->assertEquals($homeTeam, $match->getHomeTeam());
        $this->assertEquals($awayTeam, $match->getAwayTeam());

        $this->assertEquals(0, $match->getHomeTeamScore());
        $this->assertEquals(0, $match->getAwayTeamScore());
    }
}
