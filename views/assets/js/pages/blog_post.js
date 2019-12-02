// all parent elements of IMG tags in text content will have the class of "image_container"
Array.from(
    document.querySelectorAll("body > div.container > ul.block_list > .block.post_block > .content > .text_content img")
).forEach((imageElement) => {
    imageElement.parentElement.classList.add("image_container");
});

// sticky functionality for side blocks
let sideBlockElementOriginalOffsetTop;
const checkSideBlockPositionTypeFirstTime = () => {
    const sideBlockElement = document.querySelector("body > div.container > ul.side_block_list");
    sideBlockElementOriginalOffsetTop = sideBlockElement.offsetTop + (3 * parseFloat(getComputedStyle(document.documentElement).fontSize));
    checkSideBlockPositionType();
}

const checkSideBlockPositionType = () => {
    const sideBlockElement = document.querySelector("body > div.container > ul.side_block_list");
    console.log("body scrolltop: " + window.pageYOffset);
    console.log("original: " + sideBlockElementOriginalOffsetTop);
    if(window.pageYOffset >= sideBlockElementOriginalOffsetTop) {
        sideBlockElement.classList.add("fixed");
    }else {
        sideBlockElement.classList.remove("fixed");
    }
}
window.addEventListener("scroll", checkSideBlockPositionType);
checkSideBlockPositionTypeFirstTime();