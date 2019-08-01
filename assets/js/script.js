// add mobile class if mobile browser
window.addEventListener("load", function(){
    // check for mobile browsers
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.body.classList.add("mobile");
    }

    // check for unsupported browsers (ES6 support)
    try {
        Function("() => {}");
    } catch(error){
        // ES6 is not available, so add error box
        el.insertAdjacentHTML("afterbegin", '<div class="error_box"><strong>Browser not Supported</strong> &mdash; some features on this site may not work with your browser. Please switch to an alternative, like <a href="https://www.google.com/chrome/" target="_blank">Chrome</a>.</div>');
    }
});