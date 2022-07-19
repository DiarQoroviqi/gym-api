<?php

declare(strict_types=1);

namespace Domain\Contracting\Observers;

use Domain\Contracting\Enums\ContractTypes;
use Domain\Contracting\Models\Contract;

class ContractObserver
{
    public function saving(Contract $contract): void
    {
        $months = ContractTypes::from($contract->contract_type)->value;

        $contract->expired_at = $contract->started_at->addMonths($months);
    }
}
