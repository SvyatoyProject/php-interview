<?php

use Architecture\DB\Interfaces\IDatabase;
use GuzzleHttp\Client;

class Concept
{
    private Client $client;
    private IDatabase $database;

    public function __construct(IDatabase $database)
    {
        $this->client = new Client();
        $this->database = $database;
    }

    public function getUserData(): void
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->database->getSecretKey()
        ];

        $request = new Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }
}
