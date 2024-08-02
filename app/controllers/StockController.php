<?php
namespace StockAnalysis\Controllers;

use StockAnalysis\Services\StockDataService;

class StockController {
    private $stockDataService;

    public function __construct() {
        $this->stockDataService = new StockDataService(ALPHAVANTAGE_API_KEY);
    }

    public function dashboard() {
        include APP_ROOT . '/app/views/layout.php';
    }

    public function getStockPrice($symbol) {
        try {
            $price = $this->stockDataService->getLatestStockPrice($symbol);
            echo json_encode(['success' => true, 'price' => $price]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}