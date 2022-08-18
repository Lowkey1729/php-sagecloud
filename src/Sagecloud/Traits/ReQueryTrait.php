<?php

namespace SageCloud\SageCloud\Traits;


trait ReQueryTrait
{

    public function reQuery($reference): array
    {
        $url = sprintf('%s%s', self::BASE_URL, self::REQUERY);
        return $this->get($url);
    }
}