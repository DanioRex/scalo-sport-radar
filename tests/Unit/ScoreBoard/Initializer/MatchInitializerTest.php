<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Initializer;

use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Initializer\MatchInitializerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreBoard;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchInitializerTest extends TestCase
{
    public static function matchInitializerProvider(): array
    {
        return [
            [new ScoreBoard(new MatchCollection())],
        ];
    }
    
    #[DataProvider('matchInitializerProvider')]
    public function testInitializeMatch(MatchInitializerInterface $matchInitializer): void
    {
        $homeTeam = $this->createMock(TeamModelInterface::class);
        $homeTeam->expects($this->once())->method('getName')->willReturn('HOME TEAM');

        $awayTeam = $this->createMock(TeamModelInterface::class);
        $awayTeam->expects($this->once())->method('getName')->willReturn('AWAY TEAM');

        $match = $matchInitializer->initGame($homeTeam, $awayTeam);

        $this->assertEquals(0, $match->getHomeTeamScore());
        $this->assertEquals(0, $match->getAwayTeamScore());
        $this->assertNotEquals($match->getHomeTeam()->getName(), $match->getAwayTeam()->getName());
    }
}
