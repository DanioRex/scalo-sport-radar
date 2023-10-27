<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionInterface;
use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match\MatchModelDataProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionTest extends TestCase
{
    public static function collectionProvider(): array
    {
        $allMatches = MatchModelDataProvider::matchesAsSingleArray();

        return [
            [new MatchCollection(...$allMatches)],
        ];
    }
    
    #[DataProvider('collectionProvider')]
    public function testMatchCollection(MatchCollectionInterface $matchCollection): void
    {
        $this->assertIsIterable($matchCollection);
        
        $firstMatchModel = $matchCollection->current();
        $this->assertIsObject($firstMatchModel);
        $this->assertInstanceOf(MatchModelInterface::class, $firstMatchModel);
        
        $matchCollection->next();
        
        $secondMatchModel = $matchCollection->current();
        
        $this->assertIsObject($secondMatchModel);
        $this->assertInstanceOf(MatchModelInterface::class, $secondMatchModel);
        
        $this->assertNotEquals($firstMatchModel, $secondMatchModel);
        
        $matchCollection->rewind();
        $this->assertEquals($firstMatchModel, $matchCollection->current());
    }
}
