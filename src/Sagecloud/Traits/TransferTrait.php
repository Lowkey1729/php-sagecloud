<?php

namespace SageCloud\Traits;

trait TransferTrait
{

    public function fetchBanks(): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::FETCH_BANKS);
        return $this->get($url);
    }


    /**
     * @param array $params array<string string> ['bank_code' => <int>, 'account_number' => <int>]
     * @return array
     */
    public function verifyBankDetails(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::VERIFY_BANK_DETAILS);
        return $this->post($url, $params);
    }


    /**
     * @param array $params array<string string>
     *  ['reference' => <string>, 'bank_code' => <string>, 'account_number' => <string>, 'account_name' => <string>, 'amount' => <string>, 'narration' => <string>]
     * @return array
     */
    public function transferFunds(array $params): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::TRANSFER_FUNDS);
        //$res = Http::withToken($this->access_token)->post($url, $params);
        return $this->post($url, $params);
    }


}