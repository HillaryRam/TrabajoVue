<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

try {
    echo "Creating single user:\n";
    $user = User::factory()->create();
    echo "Class of single user: " . get_class($user) . "\n";

    echo "Creating multiple users:\n";
    $users = User::factory()->count(2)->create();
    echo "Class of collection: " . get_class($users) . "\n";
    foreach ($users as $index => $u) {
        echo "Class of user $index: " . get_class($u) . "\n";
    }
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
