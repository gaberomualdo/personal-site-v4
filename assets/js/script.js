// remove preload css after window has loaded
window.addEventListener("load", function(){
    // check for mobile browsers
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.body.classList.add("mobile");
    }

    // check for unsupported browsers

});