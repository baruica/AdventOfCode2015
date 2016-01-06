<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($argc != 3) {
    echo getHelp($argv);
    die();
}

$day    = ucfirst(strtolower($argv[1]));
$puzzle = ucfirst(strtolower($argv[2]));

$class = "\\$day\\$puzzle";

$runner = new $class();
$runner();

function getHelp($argv)
{
    $progName = $argv[0];
    return <<<EOHELP

php $progName DayN PuzzleN

EOHELP;

}
