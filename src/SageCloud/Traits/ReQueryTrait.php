<?php

namespace Capiflex\SageCloud\Traits;


trait ReQueryTrait
{

    /**
     * @param $reference
     * @return array
     */
    public function reQuery($reference): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::REQUERY);
        return $this->get($url);
    }
}