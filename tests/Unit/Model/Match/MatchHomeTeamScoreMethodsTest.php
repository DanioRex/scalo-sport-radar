<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchHomeTeamScoreMethodsInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class MatchHomeTeamScoreMethodsTest extends TestCase
{
    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamScoreGetter(MatchHomeTeamScoreMethodsInterface $matchModel): void
    {
        $this->assertIsInt($matchModel->getHomeTeamScore());
    }

    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamSetter(MatchHomeTeamScoreMethodsInterface $matchModel): void
    {
        $initialScore = $matchModel->getHomeTeamScore();
        $updatedScore = $initialScore + 10;
        $matchModel->setHomeTeamScore($updatedScore);

        $this->assertNotEquals($initialScore, $matchModel->getHomeTeamScore());
        $this->assertEquals($updatedScore, $matchModel->getHomeTeamScore());
    }
}
