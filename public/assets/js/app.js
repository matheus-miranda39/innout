(function () { //função auto-invocada (para evitar que as váriaveis abaixo se tornem váriaveis-globais)
    const menuToggle = document.querySelector('.menu-toggle');
    menuToggle.onclick = function (e) {
        const body = document.querySelector('body');
        body.classList.toggle('hide-sidebar'); //se a classe existe ele apaga e vice-versa, PS: n prescisa de ponto antes pq ele já espera uma classe
    }
})()
