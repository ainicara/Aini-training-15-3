<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['name', 'plan'];

    public function subscribe($plan)
    {
        $this->update(['plan' => $plan]);
    }

    public function unsubscribe()
    {
        $this->update(['plan' => null]);
    }

    public function connectServer($server)
    {
        if ($this->plan && $this->servers()->count() < Plan::getServerLimit($this->plan)) {
            $this->servers()->attach($server);
            return true;
        }
        return false;
    }

    public function servers()
    {
        return $this->belongsToMany(Server::class);
    }
}
