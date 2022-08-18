<?php

namespace Capiflex\SageCloud\Traits;

trait PowerTrait
{
    public function validateMeter(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::VALIDATE_POWER_METER);
        return $this->post($url, $params);
    }


    public function purchasePower(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::PURCHASE_POWER);
        return $this->post($url, $params);
    }

}