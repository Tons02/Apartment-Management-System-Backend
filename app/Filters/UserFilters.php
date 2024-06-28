<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class UserFilters extends QueryFilters
{
    protected array $allowedFilters = [
        "gender",
    ];

    protected array $columnSearch = [
        "id",
        "first_name",
        "middle_name",
        "last_name",
        "address",
        "contact_details",
        "gender",
        "username",
    ];
}
