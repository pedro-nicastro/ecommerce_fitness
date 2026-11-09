let carrinho = [];
const moeda = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });

function adicionarAoCarrinho(nome, preco, imagem) {
    carrinho.push({ nome, preco, imagem });
    atualizarCarrinho();
}

function removerDoCarrinho(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
}

function exibirCarrinho() {
    const container = document.getElementById('carrinho');
    if (!container) return;

    const emptyState = document.getElementById('carrinho-vazio');
    const summary = document.getElementById('carrinho-resumo');
    const continueLink = document.getElementById('btn-continuar-compra');
    container.replaceChildren();
    summary.replaceChildren();

    const isEmpty = carrinho.length === 0;
    emptyState.hidden = !isEmpty;
    continueLink.hidden = isEmpty;

    if (isEmpty) return;

    carrinho.forEach((produto, index) => {
        const row = document.createElement('article');
        row.className = 'div-produtos';

        const image = document.createElement('img');
        image.src = produto.imagem;
        image.alt = `Embalagem de ${produto.nome}`;

        const details = document.createElement('div');
        details.className = 'div-right';

        const title = document.createElement('h2');
        title.className = 'nome-do-produto';
        title.textContent = produto.nome;

        const price = document.createElement('p');
        price.className = 'preco-do-produto';
        price.textContent = moeda.format(Number(produto.preco));

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn-excluir';
        removeButton.textContent = 'Remover';
        removeButton.setAttribute('aria-label', `Remover ${produto.nome} do carrinho`);
        removeButton.addEventListener('click', () => removerDoCarrinho(index));

        details.append(title, price, removeButton);
        row.append(image, details);
        container.appendChild(row);
    });

    const total = carrinho.reduce((sum, produto) => sum + Number(produto.preco), 0);
    const summaryLabel = document.createElement('span');
    summaryLabel.textContent = `Subtotal (${carrinho.length} ${carrinho.length === 1 ? 'item' : 'itens'})`;
    const summaryTotal = document.createElement('strong');
    summaryTotal.textContent = moeda.format(total);
    summary.append(summaryLabel, summaryTotal);
}

function atualizarCarrinho() {
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    exibirCarrinho();
}

window.addEventListener('DOMContentLoaded', () => {
    try {
        carrinho = JSON.parse(localStorage.getItem('carrinho') || '[]');
        if (!Array.isArray(carrinho)) carrinho = [];
    } catch {
        carrinho = [];
    }
    exibirCarrinho();
});