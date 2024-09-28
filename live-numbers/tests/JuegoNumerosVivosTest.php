<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\JuegoNumerosVivos;

class JuegoNumerosVivosTest extends TestCase
{
    public function testJuegoNumerosVivos()
    {
        $game = new JuegoNumerosVivos();
        $this->assertEquals(1, $game->play(1));
    }
}