<?php

namespace Capiflex\SageCloud\Traits;

trait SharedDataTrait
{
    public function handleSMEDataLookup(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::SME_DATA_LOOKUP);
        return $this->get($url);
    }

    public function handleSMEDataPurchase(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::SME_DATA_PURCHASE);
        return $this->post($url, $params);
    }
}