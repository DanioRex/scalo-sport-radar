<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchAwayTeamScoreMethodsInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class MatchAwayTeamScoreMethodsTest extends TestCase
{
    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamScoreGetter(MatchAwayTeamScoreMethodsInterface $matchModel): void
    {
        $this->assertIsInt($matchModel->getAwayTeamScore());
    }

    #[DataProviderExternal(MatchModelDataProvider::class, 'matchModelProvider')]
    public function testAwayTeamSetter(MatchAwayTeamScoreMethodsInterface $matchModel): void
    {
        $initialScore = $matchModel->getAwayTeamScore();
        $updatedScore = $initialScore + 10;
        $matchModel->setAwayTeamScore($updatedScore);

        $this->assertNotEquals($initialScore, $matchModel->getAwayTeamScore());
        $this->assertEquals($updatedScore, $matchModel->getAwayTeamScore());
    }
}
