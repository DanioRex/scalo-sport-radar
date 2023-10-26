<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchAwayTeamMethodsInterface;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class MatchAwayTeamMethodsTest extends TestCase
{
    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamGetter(MatchAwayTeamMethodsInterface $matchModel): void
    {
        $this->assertIsObject($matchModel->getAwayTeam());
    }

    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamSetter(MatchAwayTeamMethodsInterface $matchModel): void
    {
        $team = $this->createMock(TeamModelInterface::class);
        $matchModel->setAwayTeam($team);

        $this->assertEquals($team, $matchModel->getAwayTeam());
    }
}
