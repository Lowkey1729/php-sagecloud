<?php

namespace Capiflex\SageCloud\Traits;

trait PowerTrait
{
    /**
     * @param array $params array<string string> [
     * 'type' => <string>,
     * 'account_number' => <string>,
     * @return array
     */
    public function validateMeter(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::VALIDATE_POWER_METER);
        return $this->post($url, $params);
    }

    /**
     * @param array $params array<string string> [
     * 'reference' => <string>,
     * 'type' => <string>,
     * 'disco' => <string>,
     * 'account_number' => <string>,
     * 'phone' => <string>,
     * 'amount' => <string>,
     * @return array
     */
    public function purchasePower(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_POWER);
        return $this->post($url, $params);
    }

    public function fetchElectricityBillers(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FETCH_POWER_BILLERS);
        return $this->get($url);
    }

}