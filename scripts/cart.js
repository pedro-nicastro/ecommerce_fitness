const CART_STORAGE_KEY = 'ms-supplements-cart';
const LEGACY_CART_STORAGE_KEY = 'carrinho';
const cartCurrency = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'BRL' });
let cartItems = [];

function addToCart(name, price, image) {
    cartItems.push({ name, price: Number(price), image });
    saveCart();
}

function removeFromCart(index) {
    cartItems.splice(index, 1);
    saveCart();
}

function renderCart() {
    const container = document.getElementById('cart-items');
    if (!container) return;

    const emptyState = document.getElementById('cart-empty-state');
    const summary = document.getElementById('cart-summary');
    const checkoutButton = document.getElementById('checkout-button');
    container.replaceChildren();
    summary.replaceChildren();

    const isEmpty = cartItems.length === 0;
    emptyState.hidden = !isEmpty;
    checkoutButton.hidden = isEmpty;
    if (isEmpty) return;

    cartItems.forEach((product, index) => {
        const row = document.createElement('article');
        row.className = 'cart-item';

        const image = document.createElement('img');
        image.src = product.image;
        image.alt = `${product.name} package`;

        const details = document.createElement('div');
        details.className = 'cart-item-details';

        const title = document.createElement('h2');
        title.className = 'cart-item-name';
        title.textContent = product.name;

        const price = document.createElement('p');
        price.className = 'cart-item-price';
        price.textContent = cartCurrency.format(Number(product.price));

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'cart-remove-button';
        removeButton.textContent = 'Remove';
        removeButton.setAttribute('aria-label', `Remove ${product.name} from your cart`);
        removeButton.addEventListener('click', () => removeFromCart(index));

        details.append(title, price, removeButton);
        row.append(image, details);
        container.appendChild(row);
    });

    const total = cartItems.reduce((sum, product) => sum + Number(product.price), 0);
    const summaryLabel = document.createElement('span');
    summaryLabel.textContent = `Subtotal (${cartItems.length} ${cartItems.length === 1 ? 'item' : 'items'})`;
    const summaryTotal = document.createElement('strong');
    summaryTotal.textContent = cartCurrency.format(total);
    summary.append(summaryLabel, summaryTotal);
}

function saveCart() {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cartItems));
    renderCart();
}

window.addEventListener('DOMContentLoaded', () => {
    try {
        const storedItems = localStorage.getItem(CART_STORAGE_KEY) || localStorage.getItem(LEGACY_CART_STORAGE_KEY) || '[]';
        const parsedItems = JSON.parse(storedItems);
        cartItems = Array.isArray(parsedItems) ? parsedItems.map((item) => ({
            name: item.name ?? item.nome,
            price: Number(item.price ?? item.preco),
            image: item.image ?? item.imagem,
        })) : [];
    } catch {
        cartItems = [];
    }
    renderCart();
});
