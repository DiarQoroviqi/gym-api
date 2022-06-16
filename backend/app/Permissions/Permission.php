<?php

declare(strict_types=1);

namespace App\Permissions;

class Permission
{
    public const CAN_CREATE_CLIENTS = 'create-clients';
    public const CAN_EDIT_CLIENTS = 'view-clients';
    public const CAN_VIEW_CLIENTS = 'edit-clients';
    public const CAN_DELETE_CLIENTS = 'delete-clients';
    public const CAN_CREATE_CONTRACTS = 'create-contract';
    public const CAN_EDIT_CONTRACTS = 'view-contracts';
    public const CAN_VIEW_CONTRACTS = 'edit-contract';
    public const CAN_DELETE_CONTRACTS = 'delete-contract';
}
