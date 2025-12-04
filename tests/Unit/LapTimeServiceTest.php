<?php

namespace Tests\Unit;

use App\Services\LapTimeService;
use PHPUnit\Framework\TestCase;

class LapTimeServiceTest extends TestCase
{
    /** @test */
    public function convierte_lap_time_a_segundos()
    {
        $service = new LapTimeService();

        $this->assertEquals(92.456, $service->lapToSeconds("1:32.456"));
        $this->assertEquals(75.100, $service->lapToSeconds("1:15.100"));
        $this->assertEquals(60.000, $service->lapToSeconds("1:00.000"));
    }

    /** @test */
    public function clasifica_pilotos_correctamente()
    {
        $service = new LapTimeService();

        $laps = [
            'Max' => '1:30.000',
            'Lewis' => '1:29.500',
            'Checo' => '1:30.200',
        ];

        $result = $service->clasificar($laps);

        $this->assertEquals(['Lewis', 'Max', 'Checo'], array_keys($result));
    }

    /** @test */
    public function obtiene_al_piloto_mas_rapido()
    {
        $service = new LapTimeService();

        $laps = [
            'Norris' => '1:31.100',
            'Sainz'  => '1:30.900',
            'Piastri' => '1:31.300',
        ];

        $this->assertEquals('Sainz', $service->masRapido($laps));
    }

    /** @test */
    public function devuelve_null_si_no_hay_tiempos()
    {
        $service = new LapTimeService();

        $this->assertNull($service->masRapido([]));
    }
}
