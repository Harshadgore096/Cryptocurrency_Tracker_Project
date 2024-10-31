const options = {
    method: 'GET',
    headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
  };
  
  fetch('https://api.tokeninsight.com/api/v1/coins/list', options)
    .then(response => response.json())
    .then(response => displayCryptos(response.data.items))
    .catch(err => console.error(err));
    const cryptoContainer = document.getElementById('crypto-container');
    




  function displayCryptos(cryptos) {
   
   
    cryptos.forEach(crypto => {
      const cryptoCard = document.createElement('div');
      cryptoCard.classList.add('crypto-card');

      const cryptoLogo = document.createElement('img');
      cryptoLogo.src = crypto.logo;
      cryptoLogo.classList.add('crypto-logo');
  
      const cryptoInfo = document.createElement('div');
      cryptoInfo.classList.add('crypto-info');
  
      const cryptoName = document.createElement('div');
      cryptoName.classList.add('crypto-name');
      cryptoName.textContent = crypto.name;
  
      const cryptoSymbol = document.createElement('div');
      cryptoSymbol.classList.add('crypto-symbol');
      cryptoSymbol.textContent = crypto.symbol;
  
      const cryptoPrice = document.createElement('div');
      cryptoPrice.classList.add('crypto-price');
      cryptoPrice.textContent = `$${crypto.price.toFixed(2)}`;
  
      const cryptoVolume = document.createElement('div');
      cryptoVolume.classList.add('crypto-volume');
      cryptoVolume.textContent = `24h Volume: $${crypto.spot_volume_24h.toFixed(2)}`;
  
      const cryptoChange = document.createElement('div');
      cryptoChange.classList.add('crypto-change');
      cryptoChange.textContent = `Change (24h): ${crypto.price_change_percentage_24h.toFixed(2)}%`;
      if (crypto.price_change_percentage_24h < 0) {
        cryptoChange.classList.add('negative');
      }
  
      const cryptoLink = document.createElement('a');
      cryptoLink.href = crypto.url;
      cryptoLink.target = '_blank';
      cryptoLink.classList.add('crypto-link');
      cryptoLink.textContent = 'More Info';
  

      const fetchButton = document.createElement("button");
      fetchButton.textContent = "Know Crypto Coin ";
      const add_to_portfolio = document.createElement("BUTTON");
      add_to_portfolio.textContent = "Add To Portfolio";
      fetchButton.onclick = () =>redirecttoDetail(crypto.id);
      add_to_portfolio.onclick = () =>addToPortfolio(crypto);
      cryptoInfo.appendChild(cryptoName);
      cryptoInfo.appendChild(cryptoSymbol);
      cryptoInfo.appendChild(cryptoPrice);
      cryptoInfo.appendChild(cryptoVolume);
      cryptoInfo.appendChild(cryptoChange);
      cryptoInfo.appendChild(cryptoLink);
      cryptoCard.appendChild(cryptoLogo);
      cryptoCard.appendChild(cryptoInfo);
      cryptoCard.appendChild(fetchButton);
      cryptoCard.appendChild(add_to_portfolio);
     cryptoContainer.appendChild(cryptoCard);
    });
  }
  
  function searchCrypto() {
    const searchInput = document.getElementById('searchInput');
    const searchTerm = searchInput.value.toLowerCase();

    fetch('https://api.tokeninsight.com/api/v1/coins/list', options)
        .then(response => response.json())
        .then(response => {
            const cryptoData = response.data.items;
            const filteredCrypto = cryptoData.filter(coin => coin.name.toLowerCase().includes(searchTerm));

            cryptoContainer.innerHTML = '';

            displayCryptos(filteredCrypto);
        })
        .catch(err => console.error(err));
}
function RedirectToTopGainers()
{
    window.location.href="top_gainers.html";
}
function RedirectToTopLosers()
{
    window.location.href="top_loosers.html";
}
function RedirectToNewListedCoins()
{
    window.location.href="newly_listed_coins.html";
}

function redirecttoDetail(cryptoid)
{
   
    const options = {
        method: 'GET',
        headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
    };
    
    
        fetch(`https://api.tokeninsight.com/api/v1/coins/${cryptoid}`, options)
            .then(response => response.json())
            .then(response => displayCoinDetails(response.data))
            .catch(err => console.error(err));
    
    
    function displayCoinDetails(data) {
        console.log('Displaying coin details:', data);
    
      
    
        const { name, symbol, logo, rating, localization, rank,id} = data;
        
         
         document.write("<button onclick=reDirectToHome()>Home</button>");
         document.write(`<h1>${name} (${symbol})</h1>`);
         document.write(`<img src=${logo} alt=${name} Logo>`);
         document.write(`<h1>Rank:${rank}</h1>`);
        
         document.write(`<h1>Last Update:${new Date(rating.update_date)}`);
         document.write(`<h1>Rating: ${rating.rating}</h1>`);
         document.write(`<h1>Description:</h1>
          <p>${localization[1].description}</p>`);
       
       
    }
    

    
}
function reDirectToHome()
{
    window.location.href="index.php";
}

 function RedirectToPortfolio()
 {
  window.location.href="ViewPortFolio.php";
 
 }

function addToPortfolio(crypto) {
    var n = window.prompt("Please Enter the Quantity You Have:");
    
    if (n !== null) { 
        var encodedCryptoId = encodeURIComponent(crypto.id);
        var encodedQuantity = encodeURIComponent(n);
        window.location.href = `portfolio.php?id=${encodedCryptoId}&quantity=${encodedQuantity}`;
    }
}

function RedirectToreport()
{
window.location.href="viewreport.php";
}
function logout()
{
window.location.href="Logout.php";
}



