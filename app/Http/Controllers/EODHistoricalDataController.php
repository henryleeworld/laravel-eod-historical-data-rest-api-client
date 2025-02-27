<?php

namespace App\Http\Controllers;

use App\Http\Integrations\EODHistoricalData\EODHistoricalDataConnector;
use App\Models\Stock;

class EODHistoricalDataController extends Controller
{
    private $eODHistoricalDataConnector;

    /**
     * Instantiate a new EODHistoricalDataController instance.
     */
    public function __construct(EODHistoricalDataConnector $eODHistoricalDataConnector)
    {
        $this->eODHistoricalDataConnector = $eODHistoricalDataConnector;
    }

    public function show() 
    {
        $stocks = Stock::where('sector', 'Information Technology')->take(10)->get();
        foreach ($stocks as $stock) {
            echo __('Stock') . ' ' . $stock->symbol . ' ' . __('real-time information: ') . $this->eODHistoricalDataConnector->stockRealTime($stock->symbol . '.US')->json() . PHP_EOL;
		}
    }
}
