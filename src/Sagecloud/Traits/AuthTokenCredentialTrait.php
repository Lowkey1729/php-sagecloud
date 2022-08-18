<?php

namespace Capiflex\SageCloud\Traits;

trait AuthTokenCredentialTrait
{
    protected string $accessToken;
    protected string $tokenExpiresIn;
    public static string $cache_path = '';

    public function __construct(
        protected string $username,
        protected string $password)
    {

    }

    protected function getUsername(): string
    {
        return $this->username;
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


}