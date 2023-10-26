<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchHomeTeamMethodsInterface;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class MatchHomeTeamMethodsTest extends TestCase
{
    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamGetter(MatchHomeTeamMethodsInterface $matchModel): void
    {
        $this->assertIsObject($matchModel->getHomeTeam());
    }

    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamSetter(MatchHomeTeamMethodsInterface $matchModel): void
    {
        $team = $this->createMock(TeamModelInterface::class);
        $matchModel->setHomeTeam($team);

        $this->assertEquals($team, $matchModel->getHomeTeam());
    }
}
