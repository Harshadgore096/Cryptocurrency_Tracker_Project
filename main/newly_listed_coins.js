const options = {
    method: 'GET',
    headers: { accept: 'application/json', TI_API_KEY: '924d2537a5c94398bd6f25fe049c42ed' },
};

const container = document.getElementById('crypto-container');

fetch('https://api.tokeninsight.com/api/v1/coins/list/newly-listed', options)
    .then(response => response.json())
    .then(response => {
        const newlyListedCoinsData = response.data.items || [];
        displayNewlyListedCoinsData(newlyListedCoinsData);
    })
    .catch(err => console.error(err));

function displayNewlyListedCoinsData(newlyListedCoinsData) {
    if (!newlyListedCoinsData || !newlyListedCoinsData.length) {
        console.error('No data available for newly listed coins.');
        return;
    }

    newlyListedCoinsData.forEach(coin => {
        const card = document.createElement('div');
        card.classList.add('crypto-card');

        card.innerHTML = `
            <img src="${coin.logo}" alt="${coin.name} Logo" class="crypto-logo">
            <div class="crypto-name">${coin.name}</div>
            <div class="crypto-symbol">${coin.symbol}</div>
            <div class="crypto-price">Price: $${coin.price.toFixed(8)}</div>
            <div class="listing-time">Listing Time: ${new Date(coin.listing_time).toLocaleString()}</div>
            <div class="spot-volume">24h Spot Volume: $${coin.spot_volume_24h.toFixed(2)}</div>
            <a href="${coin.url}" target="_blank">More Info</a>
        `;

        container.appendChild(card);
    });
}

function navigateToHome() {
    window.location.href = 'index.php';
}
