<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\DataProvider\Model\Team;

use DanioRex\ScaloSportRadar\Model\Team\TeamModel;

final class TeamModelDataProvider
{
    public static function teamModelProvider(): array
    {
        return [
            [TeamModel::create('Test Model 1')],
            [TeamModel::create('Test Model 2')],
            [TeamModel::create('Test Model 3')],
            [TeamModel::create('Test Model 4')],
            [TeamModel::create('Test Model 5')],
        ];
    }
}
