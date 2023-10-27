<?php

declare(strict_types=1);

namespace DanioRex\Test\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionAddInterface;
use DanioRex\ScaloSportRadar\Collection\Match\MatchCollection;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchCollectionAddTest extends TestCase
{
    public static function collectionsProvider(): array
    {
        return [
            [new MatchCollection(), 10],
            [new MatchCollection(), 2],
            [new MatchCollection(), 1],
        ];
    }
    
    #[DataProvider('collectionsProvider')]
    public function testMatchAdd(MatchCollectionAddInterface $collection, int $amountToAdd): void
    {
        if ($amountToAdd <= 0) {
            $amountToAdd = 1;
        }

        $this->assertGreaterThan(0, $amountToAdd);

        for ($i = 0; $i < $amountToAdd; $i++) {
            $matchModel = $this->createMock(MatchModelInterface::class);

            $this->assertIsObject($collection->add($matchModel));
        }
    }
}
