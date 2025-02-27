<?php

namespace App\Http\Integrations\EODHistoricalData;

use RadicalLoop\Eod\Facades\Eod;

final readonly class EODHistoricalDataConnector
{
    protected Eod $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Eod $eODHistoricalData)
    {
        $this->client = $eODHistoricalData;
    }

    public function stockRealTime(string $symbol) 
    {
        return $this->client::stock()->realTime($symbol);
    }
}
