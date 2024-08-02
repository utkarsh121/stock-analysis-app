<?php
namespace StockAnalysis\Services;

class StockDataService {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getLatestStockPrice($symbol) {
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$this->apiKey}";
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        if (isset($data['Global Quote']['05. price'])) {
            return $data['Global Quote']['05. price'];
        } else {
            throw new \Exception("Unable to fetch stock price");
        }
    }

    // Add more methods for different API endpoints
}