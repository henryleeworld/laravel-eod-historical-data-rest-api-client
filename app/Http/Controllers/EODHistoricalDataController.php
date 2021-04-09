<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use RadicalLoop\Eod\Facades\Eod;

class EODHistoricalDataController extends Controller
{
    private $eODHistoricalDataStock;

    /**
     * Instantiate a new EODHistoricalDataController instance.
     */
    public function __construct(Eod $eODHistoricalData)
    {
        $this->eODHistoricalDataStock = $eODHistoricalData::stock();
    }

    public function show() 
    {
        $stocks = Stock::where('sector', 'Information Technology')->take(10)->get();
        foreach ($stocks as $stock) {
            echo '股票：' . $stock->symbol . '即時資料：' . $this->eODHistoricalDataStock->realTime($stock->symbol . '.US')->json() . PHP_EOL;
		}
    }
}
