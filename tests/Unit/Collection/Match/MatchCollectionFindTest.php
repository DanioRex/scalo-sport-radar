<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionFindInterface;
use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionFindTest extends TestCase
{
    public static function existingMatchesProvider(): array
    {
        $allMatches = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($allMatches)) {
            return [];
        }

        return [
            [new MatchCollection(...$allMatches), $allMatches[0]],
        ];
    }
    
    public static function notExistingMatchesProvider(): array
    {
        $allMatches = MatchModelDataProvider::matchesAsSingleArray();
        if (empty($allMatches)) {
            return [];
        }

        $notExistingMatchModel = $allMatches[0];
        unset($allMatches[0]);

        return [
            [new MatchCollection(...$allMatches), $notExistingMatchModel],
        ];
    }
    
    #[DataProvider('existingMatchesProvider')]
    public function testSuccessMatchFind(
        MatchCollectionFindInterface $collection,
        MatchModelInterface $matchModel,
    ): void {
        $this->assertNotNull($collection->find($matchModel));
    }

    #[DataProvider('notExistingMatchesProvider')]
    public function testFailedMatchFind(
        MatchCollectionFindInterface $collection,
        ?MatchModelInterface $matchModel,
    ): void {
        $matchModel ??= $this->createMock(MatchModelInterface::class);
        
        $this->assertNull($collection->find($matchModel));
    }
}
