/* ATENÇÃO ESSE FOI O CÓDIGO MAIS DIFÍCIL QUE JÁ FIZ SEGUE O PASSO A PASSO */
/* Puxando o input (search bar e colocando tudo minúsculo) */
document.addEventListener("DOMContentLoaded", function () {
    const searchBarItem = document.getElementById("search-bar-item");
    const searchResults = document.getElementById("search-results");
/* Display block */
const input = document.getElementById("search-bar-item");
const ul = document.getElementById("search-results");
input.addEventListener("click", function Openlist() {
    ul.style.display = "block";
});
searchBarItem.addEventListener("blur", function () {
    blurTimeout = setTimeout(function () {
        searchResults.style.display = "none";
    }, 200);
});
    searchBarItem.addEventListener("input", function () {
        const query = searchBarItem.value.toLowerCase();
        // listinha de páginas do seu site
        const pages = [
            { title: "Albumina", url: "albumina-page.html" },
            { title: "BCAA em pó", url: "bcaa-page.html" },
            { title: "Creatina Monohidratada", url: "creatina-page.html" },
            { title: "Glutamina em Capsulas", url: "glutamina-page.html" },
            { title: "Termogênico Natural", url: "termogenico-page.html" },
            { title: "Whey Protein Concentrado", url: "whey-page.html" },
            { title: "Durateston", url: "https://produto.mercadolivre.com.br/MLB-1894677254-2-frascos-grow-50ml-crescer-gh-para-potros-desenvolvimento-_JM?matt_tool=18956390&utm_source=google_shopping&utm_medium=organic" },
            // coloca mais páginas caso "seje" necessário
        ];

        // Filtra as páginas que correspondem a consulta
        const filteredPages = pages.filter((page) =>
            page.title.toLowerCase().includes(query)
        );

        // Mostra os resultados da pesquisa no site
        renderResults(filteredPages);
    });

    function renderResults(results) {
        searchResults.innerHTML = ""; // Limpa resultados anteriores não tá como eu queria, mas tá lá

        if (results.length === 0) {
            searchResults.innerHTML = "<li>Nenhum resultado encontrado.</li>";/* Fala caso o cliente procure algo que não temos */
        } else {/* Adiciona na lista os produtos que temos */
            results.forEach((result) => {
                const listItem = document.createElement("li");
                const link = document.createElement("a");
                link.href = result.url;
                link.textContent = result.title;
                listItem.appendChild(link);
                searchResults.appendChild(listItem);
            });
        }
    }
});
  /*Como eu fiz isso, nem eu sei... facinho... magina pô nem demorei 5 hrs pra fazer esse bagui */