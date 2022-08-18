<?php

namespace SageCloud\Traits;

trait EducationTrait
{
    public function handleJAMBLookup(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::JAMB_LOOKUP);
        return $this->get($url);
    }

    /**
     * @param array $params
     * @return array
     */
    public function handleJAMBProfileValidation(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::JAMB_PROFILE_VALIDATE);
        return $this->post($url, $params);
    }

    public function handleJAMBPinPurchase(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::JAMB_PIN_PURCHASE);
        return $this->post($url, $params);
    }

    public function handleWAECLookup(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::WAEC_LOOKUP);
        return $this->get($url);
    }

    public function handleWAECPinPurchase(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::WAEC_PIN_PURCHASE);
        return $this->post($url, $params);
    }
}