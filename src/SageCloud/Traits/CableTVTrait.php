<?php

namespace Capiflex\SageCloud\Traits;

trait CableTVTrait
{
    /**
     * @param $provider
     * @return array
     */
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

    /**
     * @param array $params array<string string> [
     * 'biller_id' => <int>,
     * 'smartCardNo' => <string>,
     * @return array
     */
    public function validateSmartCard(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::VALIDATE_CABLETV_SMARTCARD);
        return $this->post($url, $params);
    }

    /**
     * @param array $params array<string string> ['reference' => <string>, 'code' => <string>, 'smartCardNo' => <string>, 'type' => <string>, 'renewal' => <string>]
     * @return array
     */
    public function purchaseCableTv(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_CABLE_TV);
        return $this->post($url, $params);
    }

}