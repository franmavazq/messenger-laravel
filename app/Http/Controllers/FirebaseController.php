<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
    $database = $firebase->getDatabase();
// $db = $firebase->firestore();
// $collection = $db->collection('uroomssers');
// $value = $snapshot->getValue();

//     return $db->collection('rooms');

    $auth = $firebase->getAuth();
//     $user = $auth->getUser(
// '55rYwT8nx4c9wgakBT8q875n7Qf1'
// );
//     return $user;

    $users = $auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);
    $as = 0;
foreach ($users as $user) {
    // /** @var \Kreait\Firebase\Auth\UserRecord $user */
    $as++;
}
return $user->uid;
    }
}
