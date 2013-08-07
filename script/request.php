<?php

$objects = array();

$x = file_get_contents('http://steamcommunity.com/market/search/render/?query=trading%20card&start=0&count=1');

$res = json_decode($x);

echo($res->total_count);

exit;