<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Lister;

use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\ScoreBoard\Lister\MatchListerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreBoard;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchListerTest extends TestCase
{
    public static function matchListerProvider(): array
    {
        $matchModels = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($matchModels)) {
            return [];
        }

        return [
            [new ScoreBoard(new MatchCollection(...$matchModels))],
        ];
    }
    
    #[DataProvider('matchListerProvider')]
    public function testMatchLister(MatchListerInterface $matchLister): void
    {
        $matchCollection = $matchLister->listMatches();

        $this->assertIsIterable($matchCollection);
    }
}
