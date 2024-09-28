<?php

namespace LiveNumbersTest;

use PHPUnit\Framework\TestCase;
use LiveNumbers\LiveNumbers;

class LiveNumbersTest extends TestCase
{
    public function testLiveNumbers()
    {
        $game = new LiveNumbers();
        $this->assertEquals(1, $game->play(1));
    }
}