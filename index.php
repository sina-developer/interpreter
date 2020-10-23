<?php

require("./autoload.php");

use Interpreter\InterpreterClient;

$parser = new InterpreterClient();

$data = "u + v - w + z";
$context = ['u' => 3, 'v' => 7, 'w' => 35, 'z' => 9];

$result = $parser->parse($data , $context);

echo $result;