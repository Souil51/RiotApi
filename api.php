<?php

class Api{
	
	private static $_KEY;
	private $ch;
	
	public function __construct(){
		$monFichier = fopen("C:\apiKey.txt", 'r+');
		$apiKey = fgets($monFichier);
		fclose($monFichier);
		Api::$_KEY = $apiKey;
	}
	
	private function initCurl($url){
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($this->ch, CURLOPT_URL, $url);
		
	}
	
	public function getMatch($idMatch){
		
		return json_encode(array('id'=>$idMatch));
	}
	
	public function getSummonersByName($names){
		
		$url = "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/".$names."?api_key=".Api::$_KEY;
		$this->initCurl($url);
		
		$response = curl_exec($this->ch);
		curl_close($this->ch);
		
		return $response;
	}
	
	public function getSummonersByIds($ids){
		
		$url = "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/".$ids."?api_key=".Api::$_KEY;
		$this->initCurl($url);
		
		$response = curl_exec($this->ch);
		curl_close($this->ch);
		
		return $response;
	}
	
	public function getMatchById($id){
		$url = "https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/".$id."?api_key=".Api::$_KEY;
		$this->initCurl($url);
		
		$response = curl_exec($this->ch);
		curl_close($this->ch);
		
		return $response;
	}
	
	public function test(){
		
		$url = "https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/RiotSchmick?api_key=".Api::$_KEY;
		curl_setopt($this->ch, CURLOPT_URL, $url);
		$response = curl_exec($this->ch);
		curl_close($this->ch);
		
		return $response;
	}
	
}

//summoners by ID
//https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/24102751,25945111?api_key=

//name by ID
//https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/24102751,25945111/name?api_key=

//summoners by name
//https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/RiotSchmick,Souil002?api_key=























