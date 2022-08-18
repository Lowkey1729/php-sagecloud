<?php

namespace Capiflex\SageCloud\API;

use Capiflex\SageCloud\Cache\AuthorizationCache;
use Capiflex\SageCloud\Contracts\SageCloudEndPoints;
use Capiflex\SageCloud\Traits\AirtimeTrait;
use Capiflex\SageCloud\Traits\AuthTokenCredentialTrait;
use Capiflex\SageCloud\Traits\BettingTrait;
use Capiflex\SageCloud\Traits\CableTVTrait;
use Capiflex\SageCloud\Traits\DataTrait;
use Capiflex\SageCloud\Traits\EducationTrait;
use Capiflex\SageCloud\Traits\HttpRequestTrait;
use Capiflex\SageCloud\Traits\PowerTrait;
use Capiflex\SageCloud\Traits\ReQueryTrait;
use Capiflex\SageCloud\Traits\SharedDataTrait;
use Capiflex\SageCloud\Traits\TransferTrait;

class SageCloud implements SageCloudEndPoints
{
    use AuthTokenCredentialTrait, HttpRequestTrait, TransferTrait, DataTrait,
        SharedDataTrait, AirtimeTrait, EducationTrait,
        CableTVTrait, PowerTrait, BettingTrait, ReQueryTrait;


    protected string $accessToken;
    protected string $tokenExpiresIn;
    public static string $cache_path = '';

    public function __construct(
        protected string $email,
        protected string $password)
    {
        //check for existing token in cache

        $sageCloudKey = AuthorizationCache::pull($this->email);

        if (empty($sageCloudKey)) {
            $this->getToken();
            return;
        }

        $expires_at = $this->parseTime($sageCloudKey['expires_at']);

        if ($this->differenceInHours($expires_at) <= 2) {
            $this->getToken();
            return;
        }
        $this->accessToken = $sageCloudKey['access_token'];
    }


}