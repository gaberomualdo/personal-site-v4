// css
import '../../css/normalize.min.css';
import '../../css/skeleton.min.css';
import '../../css/main.css';
// introduction in the console
import './console_intro';

const lazyload = require('./lazyload');

__createCookiesBanner(925, 16, 'xtrp.io');

// remove loading class from body when page is loaded, and fire oncroll event on window when DOM loaded, and lazyload
window.addEventListener('load', () => {
  window.dispatchEvent(new Event('scroll'));

  // remove loading class from body
  document.body.classList.remove('loading');

  // lazyload
  lazyload.update('.lazy_load');
});

// add "not_top" to nav when has scrolled from top of page
window.addEventListener('scroll', () => {
  const scrollPixelsFromTop = window.pageYOffset;
  const navHasNotTopClass = document.querySelector('body > nav').classList.contains('not_top');
  if (scrollPixelsFromTop > 0) {
    if (!navHasNotTopClass) {
      document.querySelector('body > nav').classList.add('not_top');
    }
  } else if (navHasNotTopClass) {
    document.querySelector('body > nav').classList.remove('not_top');
  }
});

// register service worker if possible and console log register status
// if ('serviceWorker' in navigator) {
//   navigator.serviceWorker
//     .register('/views/assets/js/service_worker.js')
//     .then(function (reg) {
//       console.log('Service Worker Registered Successfully');
//     })
//     .catch(function (err) {
//       console.log('Service Worker Register Failure: ', err);
//     });
// }

// add target="_blank" attribute to post content links if link is not on current domain
Array.from(document.querySelectorAll('body > div.container .post_content a')).forEach((link) => {
  if (!link.hasAttribute('target') && link.hostname != window.location.hostname) {
    link.setAttribute('target', '_blank');
    link.setAttribute('rel', 'nofollow noreferrer');
  }
});

// load post blocks on scroll functionality
if (typeof postBlocksToLoadOnScroll !== 'undefined') {
  window.addEventListener('scroll', () => {
    const scrollHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    const scrollPixelsFromTop = window.pageYOffset + window.innerHeight;

    // if 5rem from bottom of page, load more blocks
    if (scrollHeight - scrollPixelsFromTop < 10 * parseFloat(getComputedStyle(document.documentElement).fontSize)) {
      if (postBlocksToLoadOnScroll.length <= 15) {
        postBlocksToLoadOnScroll.forEach((blockInBase64) => {
          document.querySelector('body > div.container > div.block_list').innerHTML += atob(blockInBase64);

          // refresh lazy loading
          lazyload.update('.lazy_load');
        });
        postBlocksToLoadOnScroll = [];
      } else {
        for (let i = 0; i < 15; i++) {
          document.querySelector('body > div.container > div.block_list').innerHTML += atob(postBlocksToLoadOnScroll[i]);

          // refresh lazy loading
          lazyload.update('.lazy_load');
        }
        postBlocksToLoadOnScroll = postBlocksToLoadOnScroll.slice(15);
      }
    }
  });
}

// nav functionality
(() => {
  const getHeight = (elm) => elm.getBoundingClientRect().height;
  const links = document.querySelector('body > nav > ul.links');
  const nav = document.querySelector('body > nav');
  const navOverlay = document.querySelector('body > div.nav_mobile_overlay');
  const toggleNav = () => {
    nav.classList.add('links_transitioning');
    if(nav.classList.contains('links_shown')) {
      nav.setAttribute('style', '');
      navOverlay.classList.toggle('links_shown');
      setTimeout(() => {
        navOverlay.classList.remove('displayed');
        nav.classList.toggle('links_shown');
      }, 350);
    } else {
      nav.setAttribute('style', `--height: ${getHeight(nav) + getHeight(links)}px`);
      navOverlay.classList.add('displayed');
      setTimeout(() => {
        nav.classList.toggle('links_shown');
        navOverlay.classList.toggle('links_shown');
      }, 0);
    }
    setTimeout(() => {
      nav.classList.remove('links_transitioning');
    }, 350);
  };
  document.querySelector('nav .mobile_link_toggler').addEventListener('click', toggleNav);
  window.addEventListener('resize', () => {
    if(nav.classList.contains('links_shown')) {
      toggleNav();
    }
  })
})();