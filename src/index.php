<?php
declare (strict_types=1);


//require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/models/User.php';

/*
 * BaseModel test
 */
/*
$user = new User(1, firstName: 'Ildar', lastName: 'Kabirov', age: 32);
//$user->save();
//
//$user->set('firstName', 'Masha')
//    ->set('lastName', 'Kovaleva')
//    ->set('age', 16);
//echo $user->get('lastName') . PHP_EOL;
//echo $user->get('firstName') . PHP_EOL;
//echo $user->get('age') . PHP_EOL;

$data = $user->delete();

var_dump($data);
*/