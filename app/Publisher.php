<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    public static function getByStatus($status) {
        return self::where('status', $status);
    }
}
