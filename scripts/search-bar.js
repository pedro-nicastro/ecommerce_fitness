document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-bar-item');
    const searchResults = document.getElementById('search-results');
    const searchStatus = document.getElementById('search-status');

    if (!searchInput || !searchResults) return;

    const productCards = Array.from(document.querySelectorAll('.products-item'));
    const normalize = (value) => value
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLocaleLowerCase('en-US')
        .trim();

    function updateSearch() {
        const query = normalize(searchInput.value);
        const matchingProducts = productCards.filter((card) =>
            normalize(card.querySelector('.products-item-title').textContent).includes(query)
        );

        productCards.forEach((card) => {
            card.hidden = Boolean(query) && !matchingProducts.includes(card);
        });
        searchResults.replaceChildren();
        searchResults.classList.toggle('is-visible', Boolean(query));

        if (query && matchingProducts.length === 0) {
            const emptyResult = document.createElement('li');
            emptyResult.textContent = 'No products found. Try another search.';
            searchResults.appendChild(emptyResult);
        } else if (query) {
            matchingProducts.forEach((card) => {
                const productLink = card.querySelector('a');
                const result = document.createElement('li');
                const link = document.createElement('a');
                link.href = productLink.href;
                link.textContent = card.querySelector('.products-item-title').textContent;
                result.appendChild(link);
                searchResults.appendChild(result);
            });
        }

        if (searchStatus) {
            searchStatus.textContent = query
                ? `${matchingProducts.length} ${matchingProducts.length === 1 ? 'product found' : 'products found'}`
                : '';
        }
    }

    searchInput.addEventListener('input', updateSearch);
    searchInput.addEventListener('focus', updateSearch);
    searchInput.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            searchInput.value = '';
            updateSearch();
            searchInput.blur();
        }
    });
    document.addEventListener('click', (event) => {
        if (!event.target.closest('.search-bar-grid')) {
            searchResults.classList.remove('is-visible');
        }
    });
});
