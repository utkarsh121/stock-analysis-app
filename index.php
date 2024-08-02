<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/config/config.php';

use StockAnalysis\Controllers\StockController;

$action = $_GET['action'] ?? 'dashboard';

$controller = new StockController();

switch ($action) {
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'getStockPrice':
        $symbol = $_GET['symbol'] ?? '';
        $controller->getStockPrice($symbol);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        break;
}