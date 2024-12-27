<?php

require_once 'fighter.php';
require_once 'battle.php';

$fighter1 = new Fighter("Kaladin", 10, 6);
$figther2 = new Fighter("Eshonai", 8, 8);
echo($fighter1 . $figther2 . "\n");

$battle1 = new Battle($fighter1, $figther2);
echo ($battle1->fight());