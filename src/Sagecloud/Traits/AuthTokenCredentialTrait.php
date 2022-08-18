<?php

namespace Capiflex\SageCloud\Traits;

use Capiflex\SageCloud\Cache\AuthorizationCache;
use Capiflex\SageCloud\HttpClient;

trait AuthTokenCredentialTrait
{

    protected function getEmail(): string
    {
        return $this->email;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    protected function getAccessToken(): self
    {

    }

    protected function generateAccessToken(): self
    {

    }

    private function getToken(): void
    {
        $url = static::BASE_URL . '/v2/merchant/authorization';
        $http = new HttpClient();
        $res = $http::send( 'POST', $url, [
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $data = json_decode($res['RESPONSE_BODY'], true);
        $response = $data['data'];


        if ($res['HTTP_CODE'] == 200) {

            if ($data['success']) {
                $access_token = $response['token']['access_token'];
                $expires_at = $this->parseTime($response['token']['expires_at']);
                AuthorizationCache::push($this->email,  $access_token, $expires_at);
                $body = [
                    'access_token' => $access_token,
                    'expires_at' => $expires_at,
                ];


                $this->accessToken = $body['access_token'];
            }

        }
    }

    protected function parseTime($date): string
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }

    protected function differenceInHours($expired_at): int
    {
        $now = date('Y-m-d H:i:s');
        $time1 = strtotime($now);
        $time2 = strtotime($expired_at);
        return round(($time2 - $time1) / 3600, 2);
    }


}