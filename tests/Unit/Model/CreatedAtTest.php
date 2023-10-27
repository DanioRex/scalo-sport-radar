<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Model;

use DanioRex\ScaloSportRadar\Model\Interface\CreatedAtInterface;
use PHPUnit\Framework\TestCase;

class CreatedAtTest extends TestCase
{
    public static function createdAtProvider(): array
    {
        return [];
    }

    public function testCreatedAt(CreatedAtInterface $modelWithCreatedAt): void
    {
        $this->assertNotNull($modelWithCreatedAt->getCreatedAt());
        $this->assertIsString($modelWithCreatedAt->getCreatedAt()->format('Y-m-d'));
    }
}
