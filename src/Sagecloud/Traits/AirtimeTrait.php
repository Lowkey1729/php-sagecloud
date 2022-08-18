<?php

namespace Capiflex\SageCloud\Traits;

trait AirtimeTrait
{
    /**
     * @param array $params array<string, string> ['reference' => <string>, 'network' => <string>, 'service' => <string>, 'phone' => <string>, 'amount' => <string>]
     * @return array
     */
    public function purchaseAirtime(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_AIRTIME_URL);
        return $this->post($url, $params);
    }

    /**
     * @param array $params array<string, string>[
     *          'reference' => <string>,
     *          'network' => <string>
     *          'service' => <string>,
     *          'value' => <string>,
     *          'quantity' => <string>
     *      ]
     * @return array
     */
    public function purchaseEpin(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_EPIN);
        return $this->post($url, $params);
    }
}