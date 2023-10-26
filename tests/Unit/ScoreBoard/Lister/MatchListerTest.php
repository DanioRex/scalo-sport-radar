<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Lister;

use DanioRex\ScaloSportRadar\ScoreBoard\Lister\MatchListerInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchListerTest extends TestCase
{
    public static function matchListerProvider(): array
    {
        return [];
    }
    
    #[DataProvider('matchListerProvider')]
    public function testMatchLister(MatchListerInterface $matchLister): void
    {
        $matchCollection = $matchLister->listMatches();

        $this->assertIsIterable($matchCollection);
    }
}
