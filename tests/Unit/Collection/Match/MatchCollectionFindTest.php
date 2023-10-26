<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionFindInterface;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionFindTest extends TestCase
{
    public static function existingMatchesProvider(): array
    {
        return [];
    }
    
    public static function notExistingMatchesProvider(): array
    {
        return [];
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
