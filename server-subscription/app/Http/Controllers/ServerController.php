<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Server;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ServerController extends BaseController
{

    public function subscribe(Request $request, User $user, Plan $plan)
    {
        $user->subscribe($plan->name);
        return response()->json(['message' => 'Subscribed successfully']);
    }

    public function unsubscribe(Request $request, User $user)
    {
        $user->unsubscribe();
        return response()->json(['message' => 'Unsubscribed successfully']);
    }

    public function connectServer(Request $request, User $user, Server $server)
    {
        if ($user->connectServer($server)) {
            return response()->json(['message' => 'Server connected successfully']);
        } else {
            return response()->json(['message' => 'Failed to connect server']);
        }
    }
}
