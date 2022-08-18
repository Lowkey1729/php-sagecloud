<?php

namespace SageCloud\API;

use SageCloud\Cache\AuthorizationCache;
use SageCloud\Contracts\SageCloudEndPoints;
use SageCloud\Traits\AirtimeTrait;
use SageCloud\Traits\AuthTokenCredentialTrait;
use SageCloud\Traits\BettingTrait;
use SageCloud\Traits\CableTVTrait;
use SageCloud\Traits\DataTrait;
use SageCloud\Traits\EducationTrait;
use SageCloud\Traits\HttpRequestTrait;
use SageCloud\Traits\PowerTrait;
use SageCloud\Traits\ReQueryTrait;
use SageCloud\Traits\SharedDataTrait;
use SageCloud\Traits\TransferTrait;

class SageCloud implements SageCloudEndPoints
{
    use AuthTokenCredentialTrait, HttpRequestTrait, TransferTrait, DataTrait,
        SharedDataTrait, AirtimeTrait, EducationTrait,
        CableTVTrait, PowerTrait, BettingTrait, ReQueryTrait;


    protected string $accessToken;
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