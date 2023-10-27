<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionSortByTotalScoreInterface;
use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionSortByTotalScoreTest extends TestCase
{
    public static function collectionProvider(): array
    {
        $allMatches = MatchModelDataProvider::matchesAsSingleArray();

        return [
            [new MatchCollection(...$allMatches)],
        ];
    }

    #[DataProvider('collectionProvider')]
    public function testMatchSort(MatchCollectionSortByTotalScoreInterface $collection): void
    {
        $this->assertIsObject($collection->sortByTotalScore());
    }
}
