<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Collection\Match;

use DanioRex\ScaloSportRadar\Collection\Match\Interface\MatchCollectionInterface;
use DanioRex\ScaloSportRadar\Model\Match\Interface\MatchModelInterface;

final class MatchCollection implements MatchCollectionInterface
{
    /** @var MatchModelInterface[] $matches */
    protected array $matches = [];
    protected int $position = 0;

    public function __construct(MatchModelInterface ...$matchModels)
    {
        $this->matches = $matchModels;
    }

    public function current(): MatchModelInterface
    {
        return $this->matches[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->matches[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function add(MatchModelInterface $match): self
    {
        $this->matches[] = $match;

        return $this;
    }

    public function find(MatchModelInterface $matchModel): ?MatchModelInterface
    {
        foreach ($this->matches as $match) {
            if ($match === $matchModel) {
                return $match;
            }
        }

        return null;
    }

    public function remove(MatchModelInterface $match): bool
    {
        $key = array_search($match, $this->matches, true);
        if ($key !== false) {
            unset($this->matches[$key]);
            return true;
        }

        return false;
    }

    public function sortByTotalScore(): self
    {
        usort($this->matches, function (MatchModelInterface $a, MatchModelInterface $b) {
            return ($a->getAwayTeamScore() + $a->getHomeTeamScore()) -
                ($b->getAwayTeamScore() + $b->getHomeTeamScore());
        });

        return $this;
    }
}
