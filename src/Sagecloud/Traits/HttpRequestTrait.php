<?php

namespace Capiflex\SageCloud\Traits;

use Capiflex\SageCloud\HttpClient;
use Capiflex\SageCloud\Traits\AuthTokenCredentialTrait;

trait HttpRequestTrait
{

    protected function post(string $url, array $payload): array
    {
        $result = $this->httpClient()->send('POST', $url, $payload);
        return $this->response($result);
    }

    protected function put(string $url, array $payload): array
    {
        $result = $this->httpClient()->send('PUT', $url, $payload);
        return $this->response($result);
    }

    protected function delete(string $url, array $payload): array
    {
        $result = $this->httpClient()->send('DELETE', $url, $payload);
        return $this->response($result);
    }

    protected function get(string $url): array
    {
        $result = $this->httpClient()->send('GET', $url, []);
        return $this->response($result);
    }

    protected function response($res): array
    {
        $data = json_decode($res['RESPONSE_BODY']);
        return (array)$data;
    }

    protected function httpClient(): HttpClient
    {
        return HttpClient::withHeaders($this->headers());
    }

    protected function headers(): array
    {

        return [
            'Content-Type: application/json',
            "Cache-Control: no-cache",
            "Authorization: Bearer " . $this->accessToken,
        ];
    }

}