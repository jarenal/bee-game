<?php

session_start();

$bees = $_SESSION['bees'];
$response['finish'] = false;
$retry=true;

do {

	$rand = rand(0,count($bees)-1);
	if($bees[$rand]['life']>0)
	{
		$retry=false;

		switch ($bees[$rand]['name'])
		{
			case "Queen":
				$bees[$rand]['life'] = $bees[$rand]['life']-8;
				if($bees[$rand]['life']<1)
				{
					$response['finish'] = true;

					foreach ($bees as $key => $item) {
						$bees[$key]['life']=0;
					}
				}
				break;
			case "Worker":
				$bees[$rand]['life'] = $bees[$rand]['life']-10;
				break;
			default:
				$bees[$rand]['life'] = $bees[$rand]['life']-12;
				break;
		}

		if($bees[$rand]['life']<1)
			$bees[$rand]['life']=0;
	}


} while($retry==true);

$_SESSION['bees'] = $bees;

die(json_encode($response));
