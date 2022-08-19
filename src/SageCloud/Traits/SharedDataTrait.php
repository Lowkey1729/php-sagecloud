<?php

namespace Capiflex\SageCloud\Traits;

trait SharedDataTrait
{
    public function handleSMEDataLookup(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::SME_DATA_LOOKUP);
        return $this->get($url);
    }

    /**
     * @param array $params array<string string> ['service' => <string>, 'phone' => <string>, 'reference' => 'string']
     * @return array
     */
    public function handleSMEDataPurchase(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::SME_DATA_PURCHASE);
        return $this->post($url, $params);
    }

    public function handleCorporateDataLookup(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::CORPORATE_DATA_LOOKUP);
        return $this->get($url);
    }


    /**
     * @param array $params array<string string> ['service' => <string>, 'phone' => <string>, 'reference' => 'string']
     * @return array
     */
    public function handleCorporateDataPurchase(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::CORPORATE_DATA_PURCHASE);
        return $this->post($url, $params);
    }

}