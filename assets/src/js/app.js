AOS.init({
    disable: 'mobile',
});

$(document).ready(function(){
    if (screen.width > 991) {
        $("body").niceScroll();
    }
});

