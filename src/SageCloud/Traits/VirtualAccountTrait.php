<?php

namespace Capiflex\SageCloud\Traits;

trait VirtualAccountTrait
{
    public function generateVirtualAccount(array $params): array
    {
        $this->isVersion3 = true;
        $url = sprintf('%s%s', self::BASE_URL, self::GENERATE_VIRTUAL_ACCOUNT);
        return $this->post($url, $params);
    }

    public function deleteVirtualAccount(string $accountNumber): array
    {
        $this->isVersion3 = true;
        $url = sprintf('%s%s%s', self::BASE_URL, self::DELETE_VIRTUAL_ACCOUNT, $accountNumber);
        return $this->delete($url, []);
    }

    public function updateVirtualAccount(string $accountNumber): array
    {
        $this->isVersion3 = true;
        $url = sprintf('%s%s%s', self::BASE_URL, self::UPDATE_VIRTUAL_ACCOUNT, $accountNumber);
        return $this->post($url, []);
    }


}