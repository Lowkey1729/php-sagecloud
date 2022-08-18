<?php

namespace Capiflex\SageCloud\Traits;

trait CableTVTrait
{
    public function fetchCableTVByBiller($provider): array
    {
        $url = sprintf('%s%s%s', self::BASE_URL, self::FETCH_CABLE_TV_BILLERS_FOR_PROVIDERS, $provider);
        return $this->get($url);
    }

    public function fetchCableTvProviders(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FETCH_CABLE_TV_PROVIDERS);
        return $this->get($url);
    }

}