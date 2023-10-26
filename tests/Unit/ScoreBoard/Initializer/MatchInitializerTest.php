<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Initializer;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Initializer\MatchInitializerInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchInitializerTest extends TestCase
{
    public static function matchInitializerProvider(): array
    {
        return [];
    }
    
    #[DataProvider('matchInitializerProvider')]
    public function testInitializeMatch(MatchInitializerInterface $matchInitializer): void
    {
        $homeTeam = $this->createMock(TeamModelInterface::class);
        $homeTeam->setName('HOME TEAM');
        
        $awayTeam = $this->createMock(TeamModelInterface::class);
        $awayTeam->setName('AWAY TEAM');

        $match = $matchInitializer->initGame($homeTeam, $awayTeam);

        $this->assertEquals(0, $match->getHomeTeamScore());
        $this->assertEquals(0, $match->getAwayTeamScore());
        $this->assertNotEquals($match->getHomeTeam()->getName(), $match->getAwayTeam()->getName());
    }
}
