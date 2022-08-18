<?php

namespace SageCloud\Traits;

trait BettingTrait
{
    public function fetchBettingBillers(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FETCH_BETTING_BILLERS);
        return $this->get($url);
    }

    /**
     * @param array $params array<string string>['type' => string, 'customerId' => string]
     */
    public function validateBetting(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::VALIDATE_BETTING);
        return $this->post($url, $params);
    }

    /**
     * @param array $params array<string string>['reference' => <string>, 'type' => <string>, 'customerId' => <string>, 'name' => <string>, 'amount' => <string>]
     */
    public function fundBetting(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FUND_BETTING);
        return $this->post($url, $params);
    }


}