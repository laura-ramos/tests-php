<?php
require 'vendor/autoload.php'; // Autoload Composer dependencies

use GuzzleHttp\Client;

    // suma de numeros
    function sum($a, $b) {
        return $a + $b;
    }
    
    // obtener el status al conetarse con una api
    function getstatusApi(){
        $client = new GuzzleHttp\Client();

        $response = $client->get('https://pokeapi.co/api/v2/pokemon/ditto');

        return $response->getStatusCode();
    }

    // obtener los datos de la api
    function getsDataApi(){
        $client = new GuzzleHttp\Client();

        $response = $client->get('https://pokeapi.co/api/v2/pokemon/ditto');
        
        if ($response->getBody()) {
            $array = json_decode($response->getBody()->getContents(), true);
            return $array;
        } else {
            return [];
        }
        
    }
?>