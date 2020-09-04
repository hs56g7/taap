<?php
//Get the route
if (isset($url)) {
    echo "URL: {$method}@{$url} <br>".PHP_EOL;
}

//Get the User
if (isset($user_id)) {
    echo "User: #$user_id <br>".PHP_EOL;
    echo "User Type: $user_type <br>".PHP_EOL;
}

//Exception
echo get_class($exception).":{$exception->getFile()}:{$exception->getLine()} {$exception->getMessage()}".PHP_EOL;

//Input
if (!empty($input)) {
    echo "Data: ".json_encode($input).PHP_EOL;
}

//Trace
echo PHP_EOL."Trace: {$exception->getTraceAsString()}";
