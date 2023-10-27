<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionRemoveInterface;
use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionRemoveTest extends TestCase
{
    public static function collectionAndMatchesProvider(): array
    {
        $allMatches = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($allMatches)) {
            return [];
        }

        return [
            [new MatchCollection(...$allMatches), $allMatches[0]],
        ];
    }

    #[DataProvider('collectionAndMatchesProvider')]
    public function testMatchRemove(
        MatchCollectionRemoveInterface $collection,
        MatchModelInterface $matchModel,
    ): void {
        $this->assertTrue($collection->remove($matchModel));
        $this->assertFalse($collection->remove($matchModel));
    }
}
