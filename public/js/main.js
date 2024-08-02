function getStockPrice() {
    const symbol = document.getElementById('symbolInput').value;
    fetch(`${window.location.href}?action=getStockPrice&symbol=${symbol}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('result').innerHTML = `The price of ${symbol} is $${data.price}`;
            } else {
                document.getElementById('result').innerHTML = `Error: ${data.error}`;
            }
        });
}