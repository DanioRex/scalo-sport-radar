<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\ScoreBoard;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionInterface;
use DanioRex\ScaloSportRadar\Enum\TeamEnum;
use DanioRex\ScaloSportRadar\Exception\MatchNotFoundException;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;
use DanioRex\ScaloSportRadar\Model\Match\MatchModel;
use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Finalizer\MatchFinalizerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Initializer\MatchInitializerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\Lister\MatchListerInterface;
use DanioRex\ScaloSportRadar\ScoreBoard\ScoreIncrementer\ScoreIncrementerInterface;

final readonly class ScoreBoard implements
    MatchFinalizerInterface,
    MatchInitializerInterface,
    MatchListerInterface,
    ScoreIncrementerInterface
{
    public function __construct(
        private MatchCollectionInterface $matchCollection,
    ) {
    }

    public function finishGame(MatchModelInterface $match): bool
    {
        return $this->matchCollection->remove($match);
    }

    public function initGame(TeamModelInterface $homeTeam, TeamModelInterface $awayTeam): MatchModelInterface
    {
        $match = MatchModel::create($homeTeam, $awayTeam);
        $this->matchCollection->add($match);

        return $match;
    }

    public function listMatches(): MatchCollectionInterface
    {
        return $this->matchCollection->sortByTotalScore();
    }

    /**
     * @throws MatchNotFoundException
     */
    public function incrementScore(MatchModelInterface $matchModel, TeamEnum $team): void
    {
        $matchModel = $this->matchCollection->find($matchModel) ?? throw new MatchNotFoundException();

        match ($team) {
            TeamEnum::HOME => $matchModel->setHomeTeamScore($matchModel->getHomeTeamScore() + 1),
            TeamEnum::AWAY => $matchModel->setAwayTeamScore($matchModel->getAwayTeamScore() + 1),
        };
    }
}
