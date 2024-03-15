<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    const BASIC_PLAN_LIMIT = 1;
    const PRO_PLAN_LIMIT = PHP_INT_MAX;

    public static function getServerLimit($plan)
    {
        return $plan === 'basic' ? self::BASIC_PLAN_LIMIT : self::PRO_PLAN_LIMIT;
    }
}
