<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\ExchangeCalculator;
use PHPUnit\Framework\TestCase;

class ExchangeCalculatorTest extends TestCase
{

    public function testExchange()
    {
        $exchangeCalculator = new ExchangeCalculator();
        $this->assertNull($exchangeCalculator->exchange(100, 'EUR', 'ZAR'));

        $this->assertEquals(100, $exchangeCalculator->exchange(100, 'ZAR', 'ZAR'));
        $this->assertEquals(100, $exchangeCalculator->exchange(100, 'USD', 'USD'));
        $this->assertEquals(100, $exchangeCalculator->exchange(100, 'GBP', 'GBP'));
        $this->assertEquals(round(100 * 0.05164, 2), $exchangeCalculator->exchange(100, 'ZAR', 'GBP'));
        $this->assertEquals(round(100 / 0.05164, 2), $exchangeCalculator->exchange(100, 'GBP', 'ZAR'));
        $this->assertEquals(round(100 * 0.08084, 2), $exchangeCalculator->exchange(100, 'ZAR', 'USD'));
        $this->assertEquals(round(100 / 0.08084, 2), $exchangeCalculator->exchange(100, 'USD', 'ZAR'));
    }

}