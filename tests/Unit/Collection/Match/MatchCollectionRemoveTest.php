<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionRemoveInterface;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionRemoveTest extends TestCase
{
    public static function collectionAndMatchesProvider(): array
    {
        return [];
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
