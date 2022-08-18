<?php

namespace SageCloud\SageCloud\API;

use SageCloud\SageCloud\Cache\AuthorizationCache;
use SageCloud\SageCloud\Contracts\SageCloudEndPoints;
use SageCloud\SageCloud\Traits\AirtimeTrait;
use SageCloud\SageCloud\Traits\AuthTokenCredentialTrait;
use SageCloud\SageCloud\Traits\BettingTrait;
use SageCloud\SageCloud\Traits\CableTVTrait;
use SageCloud\SageCloud\Traits\DataTrait;
use SageCloud\SageCloud\Traits\EducationTrait;
use SageCloud\SageCloud\Traits\HttpRequestTrait;
use SageCloud\SageCloud\Traits\PowerTrait;
use SageCloud\SageCloud\Traits\ReQueryTrait;
use SageCloud\SageCloud\Traits\SharedDataTrait;
use SageCloud\SageCloud\Traits\TransferTrait;

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