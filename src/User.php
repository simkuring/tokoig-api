<?php

namespace Tokoig;
use GuzzleHttp\Client;
class User {
    private $httpClient;
    
    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/'
        ]);
    }    
    
    public function all()
    {
        $response = $this->httpClient->request('GET', 'users');
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }
    
    public function get($id)
    {
        try {
            $response = $this->httpClient->request('GET', "users/".$id);
            $result = $response->getBody()->getContents();
            return json_decode($result, true);
        } catch(\GuzzleHttp\Exception\RequestException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}