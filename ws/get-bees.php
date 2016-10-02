<?php
session_start();

if(!isset($_SESSION['bees']))
{
	$bees = array();

	// Queen
	$bees[] = array("name"=>"Queen", "life"=>100);

	// Workers
	for($i=0; $i<5; $i++)
	{
		$bees[] = array("name"=>"Worker", "life"=>75);
	}

	// Drones
	for($i=0; $i<8; $i++)
	{
		$bees[] = array("name"=>"Drone", "life"=>50);
	}

}
else
{
	$bees = $_SESSION['bees'];
}

$response = array("bees"=>$bees);

$_SESSION['bees'] = $bees;

die(json_encode($response));