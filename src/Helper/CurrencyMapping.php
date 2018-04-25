<?php

namespace App\Helper;

/**
 * Class CurrencyMapping
 * @package App\Helper
 * @author Dominick Makome <dominick.makome@ufirstgroup.com>
 */
final class CurrencyMapping
{
    const MAPPING_EXCHANGE = [
        'ZAR_ZAR' => 1.00,
        'USD_USD' => 1.00,
        'GBP_GBP' => 1.00,
        'ZAR_GBP' => 0.05164,
        'ZAR_USD' => 0.08084,
    ];
}