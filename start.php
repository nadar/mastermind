<?php

error_reporting(E_ALL);

include 'InputInterface.php';
include 'AlgoInterface.php';
include 'GameInterface.php';
include 'Answer.php';
include 'Runtime.php';
include 'Game.php';
include 'Algo.php';
include 'Input.php';

$runtime = new Runtime();
$runtime->setSolution(['red', 'black', 'white', 'orange', 'pink']);
echo $runtime->run();