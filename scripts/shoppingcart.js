let carrinho = [];

function adicionarAoCarrinho(nome, preco, imagem) {
    carrinho.push({ nome, preco, imagem });
    atualizarCarrinho();
}

function removerDoCarrinho(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
}

function exibirCarrinho() {
    const carrinhoContainer = document.getElementById('carrinho');
    carrinhoContainer.innerHTML = '';

    if (carrinho.length === 0) {
        const carrinhoVazio = document.getElementById('carrinho-vazio');
        carrinhoVazio.style.display = 'block';
    } else {
        carrinho.forEach((produto, index) => {
            const produtoDiv = criarElementoProduto(produto, index);
            carrinhoContainer.appendChild(produtoDiv);
        });
        const carrinhoVazio = document.getElementById('carrinho-vazio');
        carrinhoVazio.style.display = 'none';
    }
}

function criarElementoProduto(produto, index) {
    const produtoDiv = document.createElement('div');
    produtoDiv.classList.add('div-produtos');

    produtoDiv.innerHTML = `
        <div class="div-left">
            <img src="${produto.imagem}" alt="${produto.nome}">
        </div>
        <div class="div-right">
            <h3 class="nome-do-produto">${produto.nome}</h3>
            <p class="preço-do-produto">R$ ${produto.preco.toFixed(2)}</p>
            <button onclick="removerDoCarrinho(${index})" class="btn-excluir">Excluir</button>
        </div>

    `;

    return produtoDiv;
}

function atualizarCarrinho() {
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    exibirCarrinho();
}

window.addEventListener('load', () => {
    const carrinhoArmazenado = localStorage.getItem('carrinho');
    if (carrinhoArmazenado) {
        carrinho = JSON.parse(carrinhoArmazenado);
    }
    exibirCarrinho();
});