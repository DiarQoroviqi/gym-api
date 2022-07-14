<?php

declare(strict_types=1);

namespace Domain\Contracting\Enums;

enum ContractTypes: int
{
    case ONE_MONTH = 1;
    case THREE_MONTHS = 3;
    case SIX_MONTHS = 6;
    case TWELVE_MONTHS = 12;
}
