<?php

namespace App\Enums\Roles;

enum PermissionsEnum
{
    case Create;
    case View;
    case Edit;
    case Delete;
}
