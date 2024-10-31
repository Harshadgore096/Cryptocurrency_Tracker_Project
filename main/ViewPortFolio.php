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
    <h1 align="center" id="portfolio">PortFolio</h1>
    <button type="submit" id="hb" onclick="redirecttohome()">HOME</button>
  </header>
    <div id="crypto-container" class="crypto-container"></div>

    <script>
        const cryptoContainer = document.getElementById('crypto-container');

        const options = {
            method: 'GET',
            headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
        };

        <?php
        session_start();
        $user = $_SESSION["username"];

        pg_connect("dbname=cryptodime_trek user=postgres");
        $read = pg_query("select crypto_id from user_portfolio where user_name='$user';");

        while ($row = pg_fetch_row($read)) {
            $value = $row[0];
            if (!empty($value)) {
                echo "fetchCoinDetails('$value');";
            }
        }
        ?>

        function fetchCoinDetails(cryptoid) {
            fetch(`https://api.tokeninsight.com/api/v1/coins/${cryptoid}`, options)
                .then(response => response.json())
                .then(response => displayCoinDetails(response.data))
                .catch(err => console.error(err));
        }

        function displayCoinDetails(data) {
            const { name, symbol, logo, rating, localization, rank, market_data,id} = data;

            const cryptoCard = document.createElement('div');
            cryptoCard.classList.add('crypto-card');

            cryptoCard.innerHTML = `
                <h3>${name} (${symbol})</h3>
                <img src="${logo}" alt="${name} Logo">
                <h4>Rank: ${rank}</h4>
                <h3> Currency: ${market_data.price[0].currency}</h3>
                <h3>Current Market price: ${market_data.price[0].price_latest}</h3>
                <h3>Price Change Percentage (24 hrs): ${market_data.price[0].price_change_percentage_24h}</h3>
                <h3>Price Change Percentage (7 Days): ${market_data.price[0].price_change_percentage_7d}</h3>
                <h3>High (24 Hrs): ${market_data.price[0].high_24h}</h3>
                <h3>Low (24 Hrs): ${market_data.price[0].low_24h}</h3>
                <button type="button" onclick="redirecttoremove('${id}')">Remove From Portfolio</button>
            `;

            // Append the card to the cryptoContainer
            cryptoContainer.appendChild(cryptoCard);
        }
        
        function redirecttoremove(cryptoid) {
    window.location.href = `removecoin.php?id=${cryptoid}`;
}


 function redirecttohome()
 {
 window.location.href="index.php";
 
 }
        
    </script>
</body>
</html>

