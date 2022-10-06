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
use Capiflex\SageCloud\Traits\VirtualAccountTrait;

class SageCloud implements SageCloudEndPoints
{
    use AuthTokenCredentialTrait, TransferTrait, DataTrait,
        SharedDataTrait, AirtimeTrait, EducationTrait,
        CableTVTrait, PowerTrait, BettingTrait, ReQueryTrait, VirtualAccountTrait;


    protected string $accessToken = '';
    protected bool $isVersion3 = false;

    public function __construct(
        protected string      $email,
        protected string      $password,
        protected string|null $secretKey = null)
    {
        //check for existing token in cache

        $sageCloudKey = AuthorizationCache::pull($this->email);

        if (empty($sageCloudKey)) {
            $this->getToken();
            return;
        }

        $expires_at = $this->parseTime($sageCloudKey['expiresAt']);

        if ($this->differenceInHours($expires_at) <= 2) {
            $this->getToken();
            return;
        }
        $this->accessToken = $sageCloudKey['accessToken'];
    }


}