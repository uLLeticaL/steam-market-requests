<?php

$objects = array();

$x = file_get_contents('http://steamcommunity.com/market/search/render/?query=trading%20card&start=0&count=100');

$res = json_decode($x);

//get name
preg_match_all('#item_name\"\s*style=\"color:(.*)\">(.*)</span>#siU',$res->results_html, $sor);

foreach($sor[2] as $k => $v)
	$objects[$k]['name'] = $v;

//get urls
preg_match_all('# href="(.*)">\r\n\t<div\s*class=\"market_listing_row#siU',$res->results_html, $sor);

foreach($sor[1] as $k => $v)
	$objects[$k]['url'] = $v;

//get price
preg_match_all('#Starting\s*at:<br/>\r\n\t\t\t\t(.*)\t\t\t</span>#siU',$res->results_html, $sor);

foreach($sor[1] as $k => $v)
	$objects[$k]['price'] = str_replace('&#36;', '', $v);

//get image
preg_match_all('#src=\"(.*)"\s*style=\"#siU',$res->results_html, $sor);

foreach($sor[1] as $k => $v)
	$objects[$k]['image'] = $v;

//get quantity
preg_match_all('#market_listing_num_listings_qty\">(.*)</span>#siU',$res->results_html, $sor);

foreach($sor[1] as $k => $v)
	$objects[$k]['quantity'] = $v;

//get game
preg_match_all('#market_listing_game_name\">(.*)</span>#siU',$res->results_html, $sor);

foreach($sor[1] as $k => $v)
	$objects[$k]['game'] = $v;
	
print_r($objects);