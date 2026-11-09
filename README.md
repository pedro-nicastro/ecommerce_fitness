# MS Suplementos

Loja virtual de suplementos esportivos desenvolvida como projeto acadêmico. A aplicação reúne catálogo, páginas de produto, busca, carrinho e fluxos demonstrativos de conta e checkout.

## Visão geral

- Interface em HTML, CSS e JavaScript, em português brasileiro e adaptada para telas menores.
- Catálogo com busca por nome de produto.
- Carrinho mantido no navegador com `localStorage`.
- Cadastro e login em PHP com MySQL.
- Páginas de produto para albumina, BCAA, creatina, glutamina, termogênico e whey protein.

## Tecnologias

HTML5 · CSS3 · JavaScript · PHP · MySQL

## Executar localmente

1. Instale PHP com as extensões `mysqli` e `session`, além do MySQL.
2. Copie `.env.example` para `.env` e informe as credenciais do seu MySQL. O conector PHP lê esse arquivo local, que é ignorado pelo Git.
3. Crie o banco e a tabela executando [`scripts/registerScripts/Users.sql`](scripts/registerScripts/Users.sql) no MySQL.
4. Inicie o servidor na raiz do projeto:

   ```bash
   php -S localhost:8000
   ```

5. Acesse <http://localhost:8000>.

As páginas estáticas podem ser abertas diretamente, mas cadastro, login, perfil e carrinho protegido precisam ser servidos por PHP e de uma conexão MySQL válida.

## Estrutura

```text
.
├── index.html                 # Página inicial
├── products-list.html         # Catálogo e busca
├── *-page.html                # Páginas dos produtos
├── shoppingcart.php           # Carrinho
├── pagamento.html             # Checkout demonstrativo
├── scripts/
│   ├── style.css              # Estilos compartilhados
│   ├── search-bar.js          # Busca do catálogo
│   ├── shoppingcart.js        # Carrinho no navegador
│   └── registerScripts/       # Cadastro, login e esquema MySQL
└── img/                       # Imagens da loja
```

## Observações

- O checkout é apenas demonstrativo: não processa pagamentos. Não informe dados reais de cartão.
- Configure as credenciais do banco por variáveis de ambiente; nunca envie `.env` ao Git.
- O catálogo e os valores são exemplos do projeto acadêmico.

## Licença

Nenhuma licença de uso foi definida. Consulte o autor antes de reutilizar o código ou os materiais visuais.
