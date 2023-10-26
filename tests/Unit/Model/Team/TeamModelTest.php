<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\Unit\Model\Team;

use DanioRex\ScaloSportRadar\Model\Team\TeamModel;
use PHPUnit\Framework\TestCase;

final class TeamModelTest extends TestCase
{
    public function testCreateModelMethod(): void
    {
        $teamName = 'Test Team';
        
        $team = TeamModel::create($teamName);
        
        $this->assertIsObject($team);

        $this->assertEquals($teamName, $team->getName());
    }
}
