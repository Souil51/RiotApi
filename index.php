<?php

include 'php/autoload.include.php';

$api = new Api();
$action = $_GET["action"];
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$name = isset($_GET["name"]) ? $_GET["name"] : "";



switch($action){
	case "summoner" : 	if(isset($name) && !empty($name)){
							$response = json_decode($api->getSummonersByName($name), true);
							if(isset($response["status"])) echo " summoner doesn't exist ";
						}
						else echo " Summoner not set "; 
						break;
	case "match" : if(isset($id) && !empty($id)){
						$response = json_decode($api->getMatchById($id), true);
						if(isset($response["status"])) echo " match not found ";
					}
					else echo " Summoner not set "; 
					break;
	default : echo " unknown action ";
}


echo json_encode($response);
