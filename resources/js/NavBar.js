console.log('navbar.js carregado');

window.addEventListener('load', () => {
    console.log('window load disparou');

    const hamburger = document.querySelector('.hamburger');
    const navegacao = document.querySelector('.navegacao');

    console.log('hamburger:', hamburger);
    console.log('navegacao:', navegacao);

    if (!hamburger || !navegacao) return;

    hamburger.addEventListener('click', () => {
        console.log('clicou no hamburger');
        hamburger.classList.toggle('ativo');
        navegacao.classList.toggle('aberto');
    });
});