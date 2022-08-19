<?php

namespace Capiflex\SageCloud\Traits;

trait DataTrait
{
    /**
     * @return array
     */
    public function fetchDataProviders(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FETCH_DATA_PROVIDERS);
        return $this->get($url);
    }


    /**
     * @param $provider
     * @return array
     */
    public function fetchDataBundles($provider): array
    {
        $url = sprintf('%s%s%s', self::BASE_URL, self::FETCH_DATA_BUNDLES, $provider);
        return $this->get($url);
    }


    /**
     * @param array  array<string, string> ['reference' => <string>, 'type' => <string>, 'network' => <string>, 'phone' => <string>, 'provider' => <string>, 'code' => <string>]
     * @return array
     */
    public function purchaseData(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_DATA);
        return $this->post($url, $params);
    }

}