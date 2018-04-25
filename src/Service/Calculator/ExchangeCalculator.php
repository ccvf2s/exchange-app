<?php

namespace App\Service\Calculator;
use App\Helper\CurrencyMapping;

/**
 * Class ExchangeCalculator
 * @package App\Service\Calculator
 * @author Dominick Makome <makomedominick@gmail.com>
 */
class ExchangeCalculator
{

    /**
     * @param float $amount
     * @param string $from
     * @param string $to
     *
     * @return float|null
     */
    public function exchange(float $amount, string $from, string $to): ?float
    {
        $fromTo = "{$from}_{$to}";
        $toFrom = "{$to}_{$from}";
        $keys = array_keys(CurrencyMapping::MAPPING_EXCHANGE);

        if (!in_array($fromTo, $keys) && !in_array($toFrom, $keys)) {
            return null;
        }

        if (isset(CurrencyMapping::MAPPING_EXCHANGE[$fromTo])) {
            return $amount * CurrencyMapping::MAPPING_EXCHANGE[$fromTo];
        }

        return $amount / CurrencyMapping::MAPPING_EXCHANGE[$toFrom];
    }

}