<?php

use App\Models\User;
use App\Models\Server;
use App\Models\Plan;

print "\n\nOOP Practice !\n\n";

// Setting Up required details
$user = new User();
$user->name = 'Aini Hidayah';

$server_1 = new Server();
$server_1->name = 'Server 1';
$server_1->ipAddress = '192.168.0.1';

$server_2 = new Server();
$server_2->name = 'Server 2';
$server_2->ipAddress = '192.168.0.2';

// Flow 1 - Basic Plan
print "Flow #1 Basic Plan Subscription !\n\n";

// Assuming $user and $server_1, $server_2 are retrieved from database
$user->subscribe('basic');

$user->connectServer($server_1);
$user->connectServer($server_2); // fail

// Flow 2 - Pro Plan
print "Flow #2 Upgrade Plan Subscription !\n\n";

$user->subscribe('pro');
$user->connectServer($server_2); // success

// Flow 3 - Unsubscribe
print "Flow #3 Unsubscribe Plan Subscription !\n\n";

$user->unsubscribe();
$user->connectServer($server_2); // fail
