<?php

namespace Capiflex\SageCloud\Traits;

trait AuthTokenCredentialTrait
{

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