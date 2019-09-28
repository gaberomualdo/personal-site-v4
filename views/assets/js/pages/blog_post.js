// all parent elements of IMG tags in text content will have the class of "image_container"
Array.from(
    document.querySelectorAll("body > div.container > ul.block_list > .block.post_block > .content > .text_content img")
).forEach((imageElement) => {
    imageElement.parentElement.classList.add("image_container");
});