var urlAtual = window.location.pathname;
if (urlAtual === "/views/inicio.html") {
    document.querySelector('.pagina-ativa').classList.add('ativo');
}

var iconePrint = document.getElementById('icone-sistema');
iconePrint.addEventListener('click', function() {
    window.location.href = '../views/inicio.html';
});