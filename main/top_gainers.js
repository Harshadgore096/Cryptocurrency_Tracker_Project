const options = {
    method: 'GET',
    headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
};

const container = document.getElementById('crypto-container');

fetch('https://api.tokeninsight.com/api/v1/coins/top-gainers', options)
    .then(response => response.json())
    .then(response => {
        const topGainersData = response.data;
        displayTopGainersData(topGainersData);
    })
    .catch(err => console.error(err));

function displayTopGainersData(topGainersData) {
    if (!topGainersData || !topGainersData.length) {
        console.error('No data available for top gainers.');
        return;
    }

    topGainersData.forEach(coin => {
        const card = document.createElement('div');
        card.classList.add('crypto-card');

        card.innerHTML = `
            <img src="${coin.logo}" alt="${coin.name} Logo" class="crypto-logo">
            <div class="crypto-name">${coin.name}</div>
            <div class="crypto-symbol">${coin.symbol}</div>
            <div class="crypto-price">Price: $${coin.price.toFixed(2)}</div>
            <div class="crypto-change ${coin.price_change_24h >= 0 ? 'crypto-change' : 'crypto-change-negative'}">
                Change (24h): ${coin.price_change_24h.toFixed(2)}%
            </div>
            <a href="${coin.url}" target="_blank">More Info</a>
        `;

        container.appendChild(card);
    });
}

function navigateToHome() {
    window.location.href = 'index.php';
}
