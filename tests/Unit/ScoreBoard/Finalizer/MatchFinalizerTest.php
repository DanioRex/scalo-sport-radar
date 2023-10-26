<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\ScoreBoard\Finalizer;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Finalizer\MatchFinalizerInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchFinalizerTest extends TestCase
{
    public static function matchFinalizerAndMatchModelProvider(): array
    {
        return [];
    }

    #[DataProvider('matchFinalizerAndMatchModelProvider')]
    public function testFinalizeMatch(MatchFinalizerInterface $finalizer, MatchModelInterface $match): void
    {
        $this->assertEquals(true, $finalizer->finishGame($match));
    }
}
