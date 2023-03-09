<?php
require_once './User.php';
require_once './Comment.php';
require_once '../vendor/autoload.php';

use Respect\Validation\Rules\Size;
use Symfony\Component\Validator\Constraints\EmailValidator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;

echo "\nId:\n";
$user1 = new User(-1, "Timofey", "sobaka@ya.ru", "L45j");
echo "\n";
$user2 = new User(22303223100, "Timofey", "sobaka@ya.ru", "L45j");
echo "\nId and name:\n";
$user3 = new User(-1, "", "sobaka@ya.ru", "L45j");
echo "\nEmail:\n";
$user4 = new User(1, "Fa", "@yaas.ru", "L45j");
echo "\n";
$user4 = new User(1, "Fa", "", "L45j");
echo "\nPassword:\n";
$user5 = new User(1, "Fa", "sobaka@ya.ru", "L44");
echo "\n";
$user5 = new User(1, "Fa", "sobaka@ya.ru", "");

echo "\nEverything bad:\n";
$user5 = new User(-1, "1", "sobasdfdsf3224232", "lfd");

echo "\n\n";
$userOK = new User(2, "Timofey", "sobaka@gmail.com", "L45j");
$user1 = new User(3, "Nikolay", "cat@gmail.com", "s78ofdfj");
$needTime = new DateTime('now');
$user2 = new User(4, "Vlad", "fish@gmail.com", "54j45523kf");
$user3 = new User(5, "Maks", "work@gmail.com", "1121mf054gdvsp");

$comm1 = new Comment($userOK, 'Привет');
$comm2 = new Comment($user1, 'Hello');
$comm3 = new Comment($user2, 'Ahoj');
$comm4 = new Comment($userOK, 'Hallo');
$comm5 = new Comment($user3, 'Salut');

$array = array($comm1, $comm2, $comm3, $comm4, $comm5);
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i]->afterDateTime($needTime)) {
        echo $i . " : " . $array[$i]->getMessage() . "\n";
    }
}