<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Finalizer;

use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Finalizer\MatchFinalizerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreBoard;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchFinalizerTest extends TestCase
{
    public static function matchFinalizerAndMatchModelProvider(): array
    {
        $matchModels = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($matchModels)) {
            return [];
        }

        return [
            [new ScoreBoard(new MatchCollection(...$matchModels)), $matchModels[0]],
        ];
    }

    #[DataProvider('matchFinalizerAndMatchModelProvider')]
    public function testFinalizeMatch(MatchFinalizerInterface $finalizer, MatchModelInterface $match): void
    {
        $this->assertEquals(true, $finalizer->finishGame($match));
    }
}
