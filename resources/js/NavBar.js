document.addEventListener('DOMContentLoaded', () => {

    const hamburger = document.querySelector('.hamburger');
    const navegacao = document.querySelector('.navegacao');

    // se o elemento 'hamburger' realmente existir na página, evitando erros de console
    hamburger?.addEventListener('click', () => {

        hamburger.classList.toggle('ativo');
        // Esta classe é a responsável por mudar o display: none para flex no CSS.
        navegacao.classList.toggle('aberto');
    });
});