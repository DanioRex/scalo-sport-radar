<?php

declare(strict_types=1);

namespace DanioRex\ScaloSportRadar\Collection\Match\Interface;

interface MatchCollectionInterface extends
    MatchCollectionAddInterface,
    MatchCollectionFindByKeyInterface,
    MatchCollectionRemoveByKeyInterface,
    MatchCollectionSortByTotalScoreInterface,
    \Iterator
{
}
