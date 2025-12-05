<?php

namespace App\Services;

final class LapTimeService
{
    /**
     * Convierte formato 'm:ss.mmm' a segundos (float)
     *
     * @param  string  $lapTime  Ej. "1:32.456"
     *
     * @throws \InvalidArgumentException si el formato es inválido
     */
    public function lapToSeconds(string $lapTime): float
    {

        if (! str_contains($lapTime, ':')) {
            throw new \InvalidArgumentException('Formato inválido, falta ":"');
        }

        [$minutes, $seconds] = explode(':', $lapTime, 2);

        if ($minutes === '' || $seconds === '') {
            throw new \InvalidArgumentException('Formato inválido, minutos/segundos vacíos');
        }
        if (! ctype_digit($minutes)) {
            throw new \InvalidArgumentException('Minutos deben ser enteros');
        }

        if (! preg_match('/^\d{1,2}(\.\d{1,3})?$/', $seconds)) {
            throw new \InvalidArgumentException('Segundos inválidos (use ss o ss.mmm)');
        }

        return (int) $minutes * 60 + (float) $seconds;
    }

    /**
     * Recibe array asociativo piloto => "m:ss.mmm" y regresa clasificación (ascendente por tiempo)
     *
     * @param  array<string,string>  $laps
     * @return array<string,float> piloto => segundos
     */
    public function clasificar(array $laps): array
    {
        $result = [];
        foreach ($laps as $piloto => $tiempo) {
            $result[$piloto] = $this->lapToSeconds($tiempo);
        }

        asort($result, SORT_NUMERIC);

        return $result;
    }

    /**
     * Regresa el nombre del piloto más rápido o null si el arreglo está vacío
     *
     * @param  array<string,string>  $laps
     */
    public function masRapido(array $laps): ?string
    {
        $clasificacion = $this->clasificar($laps);

        return empty($clasificacion) ? null : array_key_first($clasificacion);
    }
}
