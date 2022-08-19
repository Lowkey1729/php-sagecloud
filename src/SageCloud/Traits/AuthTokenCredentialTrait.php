<?php

namespace Capiflex\SageCloud\Traits;

use Capiflex\SageCloud\Cache\AuthorizationCache;
use Capiflex\SageCloud\HttpClient;

trait AuthTokenCredentialTrait
{
    use HttpRequestTrait;

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

    protected function getToken(): void
    {
        $url = static::BASE_URL . '/v2/merchant/authorization';
        $res = $this->httpClient()->send('POST', $url, [
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $data = json_decode($res['RESPONSE_BODY'], true);


        if ($res['HTTP_CODE'] == 200) {


            if ($data['success']) {
                $response = $data['data'];
                $access_token = $response['token']['access_token'];
                $expires_at = $this->parseTime($response['token']['expires_at']);
                AuthorizationCache::push($this->email, $access_token, $expires_at);

                $this->accessToken = $access_token;
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