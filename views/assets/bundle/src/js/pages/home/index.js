// css
import '../../../css/pages/home.css';

/* display welcome header animation followed by social url and text animations */
window.addEventListener('load', () => {
  document
    .querySelector('body > div.container > ul.block_list > .block.welcome > .content > div.text > div.top > div.right > h1.catchy_header')
    .classList.add('animation_shown');

  // get header transition time in ms and store in var
  const headerTransitionTimeSeconds =
    parseInt(
      document
        .querySelector(
          'body > div.container > ul.block_list > .block.welcome > .content > div.text > div.top > div.right > h1.catchy_header > span.word_container:last-child > span.word_animated'
        )
        .style.transitionDelay.split('s')[0]
    ) + 0.6;

  // fire social url and text animations after header animation finishes
  setTimeout(() => {
    // animate social urls
    const socialURLsElement = document.querySelector(
      'body > div.container > ul.block_list > .block.welcome > .content > div.text > div.top > div.right > ul.social_links'
    );
    socialURLsElement.style.opacity = '1';
    socialURLsElement.classList.add('fadeIn');

    // animate text
    const textElement = document.querySelector('body > div.container > ul.block_list > .block.welcome > .content > div.text > div.text_content');
    textElement.style.opacity = '1';
    textElement.classList.add('fadeIn');
  }, headerTransitionTimeSeconds * 1000);
});
