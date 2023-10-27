<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\ScoreIncrementer;

use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Enum\TeamEnum;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreBoard;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreIncrementer\ScoreIncrementerInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ScoreIncrementerTest extends TestCase
{
    public static function scoreIncrementerAndMatchModelProvider(): array
    {
        $matchModels = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($matchModels)) {
            return [];
        }

        return [
            [new ScoreBoard(new MatchCollection(...$matchModels)), $matchModels[0]],
        ];
    }

    #[DataProvider('scoreIncrementerAndMatchModelProvider')]
    public function testHomeScoreIncrementer(
        ScoreIncrementerInterface $scoreIncrementer,
        MatchModelInterface $matchModel,
    ): void {
        $initialHomeScore = $matchModel->getHomeTeamScore();
        $initialAwayScore = $matchModel->getAwayTeamScore();

        $scoreIncrementer->incrementScore($matchModel, TeamEnum::HOME);

        $this->assertEquals($initialHomeScore + 1, $matchModel->getHomeTeamScore());
        $this->assertEquals($initialAwayScore, $matchModel->getAwayTeamScore());
    }

    #[DataProvider('scoreIncrementerAndMatchModelProvider')]
    public function testAwayScoreIncrementer(
        ScoreIncrementerInterface $scoreIncrementer,
        MatchModelInterface $matchModel,
    ): void {
        $initialHomeScore = $matchModel->getHomeTeamScore();
        $initialAwayScore = $matchModel->getAwayTeamScore();

        $scoreIncrementer->incrementScore($matchModel, TeamEnum::AWAY);
        $updatedAwayTeamScore = $matchModel->getAwayTeamScore();

        $this->assertEquals($initialAwayScore + 1, $updatedAwayTeamScore);
        $this->assertEquals($initialHomeScore, $matchModel->getHomeTeamScore());
    }
}
