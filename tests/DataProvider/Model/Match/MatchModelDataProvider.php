<?php

declare(strict_types=1);

namespace DanioRex\Test\ScaloSportRadar\DataProvider\Model\Match;

use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\Model\Match\MatchModel;
use DanioRex\ScaloSportRadar\Model\Team\TeamModel;

final class MatchModelDataProvider
{
    public static function matchModelProvider(): array
    {
        return [
            [MatchModel::create(TeamModel::create('Home Team 1'), TeamModel::create('Away Team 1'))],
            [MatchModel::create(TeamModel::create('Home Team 2'), TeamModel::create('Away Team 2'))],
            [MatchModel::create(TeamModel::create('Home Team 3'), TeamModel::create('Away Team 3'))],
            [MatchModel::create(TeamModel::create('Home Team 4'), TeamModel::create('Away Team 4'))],
            [MatchModel::create(TeamModel::create('Home Team 5'), TeamModel::create('Away Team 5'))],
        ];
    }

    public static function matchesAsSingleArray(): array
    {
        $matchesSingleArray = [];
        $providedMatches = self::matchModelProvider();
        foreach ($providedMatches as $matchesArray) {
            if (!is_array($matchesArray)) {
                continue;
            }

            foreach ($matchesArray as $matchModel) {
                if ($matchModel instanceof MatchModelInterface) {
                    $matchesSingleArray[] = $matchModel;
                }
            }
        }

        return $matchesSingleArray;
    }
}
