// all parent elements of IMG tags in text content will have the class of "image_container"
Array.from(document.querySelectorAll('body > div.container > ul.block_list > .block.post_block > .content > .text_content img')).forEach(
  (imageElement) => {
    imageElement.parentElement.classList.add('image_container');
  }
);

// sticky functionality for side blocks
let sideBlockElementOriginalOffsetTop;
const checkSideBlockPositionTypeFirstTime = () => {
  const sideBlockElement = document.querySelector('body > div.container > ul.side_block_list');
  sideBlockElementOriginalOffsetTop = sideBlockElement.offsetTop + 3 * parseFloat(getComputedStyle(document.documentElement).fontSize);
  checkSideBlockPositionType();
};

const checkSideBlockPositionType = () => {
  const sideBlockElement = document.querySelector('body > div.container > ul.side_block_list');
  if (window.pageYOffset >= sideBlockElementOriginalOffsetTop) {
    sideBlockElement.classList.add('fixed');
  } else {
    sideBlockElement.classList.remove('fixed');
  }
};
window.addEventListener('scroll', checkSideBlockPositionType);
checkSideBlockPositionTypeFirstTime();

// scroll progress bar functionality
(() => {
  // function to check scroll position and update scroll progress bar accordingly
  const updateScrollProgressBar = () => {
    // variables for progress bar and post container elements
    const progressContainerEl = document.querySelector('body > div.scroll_progress_bar_container');
    const progressBarEl = document.querySelector('body > div.scroll_progress_bar_container > div.scroll_progress_bar');

    // get full scroll height
    const scrollHeight = document.body.scrollHeight - window.innerHeight;
    // get current scroll position
    const scrollPosition = window.pageYOffset;

    // get scroll percentage and set width of progress bar
    const scrollPercentage = (scrollPosition / scrollHeight) * 100;
    console.log(progressBarEl);
    progressBarEl.style.width = scrollPercentage + '%';

    console.log(scrollPosition + '/' + scrollHeight);
  };

  // bind window onload and onscroll events to update scroll progress bar width
  window.addEventListener('scroll', updateScrollProgressBar);
  window.addEventListener('load', updateScrollProgressBar);
})();
