<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Model\Team;

use DanioRex\ScaloSportRadar\Model\Team\Interface\TeamModelInterface;

final class TeamModel implements Interface\TeamModelInterface
{
    protected function __construct(
        protected string $name,
    ) {
    }

    public static function create(string $name): TeamModelInterface
    {
        return new self(
            name: $name,
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
