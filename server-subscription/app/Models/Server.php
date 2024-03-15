<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['name', 'ipAddress'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
