<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class RoleFilters extends QueryFilters
{
    protected array $columnSearch = [
        "name",
        "access_permission",
    ];
}
