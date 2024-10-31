<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body{
 background-color: rgb(130,129,131);
}

#portfolio{
 color:gold;
 font-weight:bolder;
 font-size:60px;
 border:3px solid;}
 
 #hb{
 margin-left:30px;
 width:90px;
 height:50px;
 background-color:aqua;
 color:green;
 
 }
</style>
</head>
<body>
<header>
    <h1 align="center" id="portfolio">PortFolio Report </h1>
   
    <button type="submit" id="hb" onclick="redirecttohome()">HOME</button>
  </header>
    <div id="crypto-container" class="crypto-container"></div>
    <div id="detail-section"></div>
    <script>
    const cryptoContainer = document.getElementById('crypto-container');
let totalInvested = 0;
let totalProfitLoss = 0;

const options = {
    method: 'GET',
    headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
};

<?php
session_start();
$user = $_SESSION["username"];

pg_connect("dbname=cryptodime_trek user=postgres");
$read = pg_query("select * from user_portfolio where user_name='$user';");

while ($row = pg_fetch_assoc($read)) {
    $value = $row['crypto_id'];
    $quantity = $row['quantity'];
    if (!empty($value)) {
        echo "fetchCoinDetails('$value', $quantity);";
    }
}
?>

function fetchCoinDetails(cryptoid, quantity) {
    fetch(`https://api.tokeninsight.com/api/v1/coins/${cryptoid}`, options)
        .then(response => response.json())
        .then(response => displayCoinDetails(response.data, quantity))
        .catch(err => console.error(err));
}

function displayCoinDetails(data, quantity) {
    const { name, symbol, market_data, id } = data;
    const { price_latest } = market_data.price[0];

    const invested = quantity * price_latest;
    totalInvested += invested;

    const profitLoss = invested * (market_data.price[0].price_change_percentage_24h / 100);
    totalProfitLoss+=profitLoss;
    
    const cryptoCard = document.createElement('div');
    cryptoCard.classList.add('crypto-card');

    cryptoCard.innerHTML = `
        <h3>${name} (${symbol})</h3>
        <h4>Net Quantity: ${quantity}</h4>
        <h4>Invested: $${invested.toFixed(2)}</h4>
        <h4>Profit/Loss: $${profitLoss.toFixed(2)}</h4>
        <button type="button" onclick="redirecttoremove('${id}')">Remove From Portfolio</button>
    `;

    // Append the card to the cryptoContainer
    cryptoContainer.appendChild(cryptoCard);

    if (totalInvested !== 0) {
        // Display total invested at the end
        const totalInvestedElement = document.createElement('div');
         if(totalProfitLoss<0)
         {
        totalInvestedElement.innerHTML = `<h4 style=color:gold;>Total Invested: $${totalInvested.toFixed(2)}</h4><br><br>
        <h4 style=color:red;>Total Loss: $${totalProfitLoss.toFixed(2)}</h4>`;
        }
        else
        {
        
        totalInvestedElement.innerHTML = `<h4 style=color:gold;>Total Invested: $${totalInvested.toFixed(2)}</h4><br><br>
        <h4 style=color:green;>Total Profit: $${totalProfitLoss.toFixed(2)}</h4>`;
        
        }

       
       
                cryptoContainer.appendChild(totalInvestedElement);
    }
    
     
}

function redirecttoremove(cryptoid) {
    window.location.href = `removecoin.php?id=${cryptoid}`;
}

function redirecttohome() {
    window.location.href = "index.php";
}




    </script>
    </body>
    </html>
