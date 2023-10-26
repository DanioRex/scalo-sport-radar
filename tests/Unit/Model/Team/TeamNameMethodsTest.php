<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Team;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamNameMethodsInterface;
use DanioRex\Test\ScaloSportRadar\DataProvider\Model\Team\TeamModelDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class TeamNameMethodsTest extends TestCase
{
    #[DataProviderExternal(TeamModelDataProvider::class, 'teamModelProvider')]
    public function testNameGetter(TeamNameMethodsInterface $teamModel): void
    {
        $this->assertIsString($teamModel->getName());
    }

    #[DataProviderExternal(TeamModelDataProvider::class, 'teamModelProvider')]
    public function testNameSettet(TeamNameMethodsInterface $teamModel): void
    {
        $length = random_int(10, 20);
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $updatedName = '';

        for ($i = 0; $i < $length; $i++) {
            $updatedName .= $characters[random_int(0, $charactersLength - 1)];
        }

        $initialName = $teamModel->getName();
        $teamModel->setName($updatedName);

        $this->assertNotEquals($initialName, $teamModel->getName());
        $this->assertEquals($updatedName, $teamModel->getName());
    }
}
