// remove loading class from body when page is loaded
window.addEventListener("load", () => {
    document.body.classList.remove("loading");
});

// add "not_top" to nav when has scrolled from top of page
window.addEventListener("scroll", () => {
    const scrollPixelsFromTop = window.pageYOffset;
    const navHasNotTopClass = document.querySelector("body > nav").classList.contains("not_top");
    if(scrollPixelsFromTop > 0) {
        if(!navHasNotTopClass) {
            document.querySelector("body > nav").classList.add("not_top");
        }
    } else if (navHasNotTopClass) {
        document.querySelector("body > nav").classList.remove("not_top");
    }
});

// register service worker if possible and console log register status
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/views/assets/js/service_worker.js').then(function(reg){
        console.log("Service Worker Registered Successfully");
    }).catch(function(err) {
        console.log("Service Worker Register Failure: ", err);
    });
}