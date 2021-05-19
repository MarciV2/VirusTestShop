var myNav = document.getElementById('navbar');
window.onscroll = function () {
    if (document.body.scrollTop >= 295 || document.documentElement.scrollTop >= 295) {
        myNav.classList.add("windowedPageNavbar");
        myNav.classList.remove("windowedPageNavbar-transparent");
    }
        
    else {
        myNav.classList.add("windowedPageNavbar-transparent");
        myNav.classList.remove("windowedPageNavbar");
    }
};


new Notify({
    title: 'Notify Title',
    text: 'Notify Message',
    effect: 'slide',
    speed: 300,
    status: 'success',
    autoclose: true,
    autotimeout: 3000,
    gap: 20,
    distance: 20
})