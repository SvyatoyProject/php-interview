<?php

interface IXMLHTTPRequest
{
    // ...
}

interface IXMLHttp extends IXMLHTTPRequest
{
    public function request(string $url, string $method, array $options = []): mixed;
}

class XMLHTTPRequestService implements IXMLHTTPRequest
{
    // ...
}

class XMLHttpService extends XMLHTTPRequestService implements IXMLHttp
{
    public function request(string $url, string $method, array $options = []): mixed
    {
        return [$url, $method, $options];
    }
}

class Http
{
    private IXMLHttp $service;

    public function __construct(IXMLHttp $xmlHttpService)
    {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options): array
    {
        return $this->service->request($url, 'GET', $options);
    }

    public function post(string $url): bool
    {
        return (bool)$this->service->request($url, 'GET');
    }
}

$service = new XMLHttpService();
$http = new Http($service);
$result = [
    $http->get('/test.html', ['test']),
    $http->post('/test2.html')
];

return $result;
