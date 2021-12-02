

$(document).ready(function(){
    jQuery(".menu-hamburguer").click(function () {
        jQuery(".header-nav-menu").toggleClass("ativo");
        jQuery(".menu-hamburguer").toggleClass("is-active")
    });
});

