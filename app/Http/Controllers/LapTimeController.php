<?php

namespace App\Http\Controllers;

use App\Services\LapTimeService;
use Illuminate\Http\Request;

class LapTimeController extends Controller
{
    private LapTimeService $service;

    public function __construct(LapTimeService $service)
    {
        $this->service = $service;
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'time' => 'required|string',
        ]);

        $seconds = $this->service->lapToSeconds($request->time);

        return response()->json([
            'original' => $request->time,
            'seconds' => $seconds,
        ]);
    }
}

