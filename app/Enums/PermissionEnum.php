<?php

declare(strict_types=1);

namespace App\Enums;

enum PermissionEnum: string
{
    case DASHBOARD_HR = 'dashboard_hr';
    case DASHBOARD_ADMIN = 'dashboard_admin';
    case DASHBOARD_HEAD = 'dashboard_head';
}
