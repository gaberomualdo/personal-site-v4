// css
import '../../../css/pages/code.css';

window.addEventListener('load', () => {
  const mobileWidth = 800;
  document.querySelectorAll('.block.project .slide-down').forEach((e) => {
    const clickEvt = (elm) => {
      elm.classList.toggle('open');
      const toSlide = elm.nextElementSibling;
      toSlide.classList.toggle('open');
      toSlide.style.height = `${toSlide.scrollHeight}px`;
    };
    e.addEventListener('click', (evt) => {
      clickEvt(e);
    });
    if (/* window.innerWidth > mobileWidth */ false) {
      clickEvt(e);
    }
  });

  document.querySelectorAll('.block.project > .main .list.bullets a[href]').forEach((e) => {
    e.setAttribute('target', '_blank');
  });

  // scroll to project if applicable
  const urlParams = new URLSearchParams(window.location.search);
  const project = urlParams.get('p');
  if (project) {
    const toScrollTo = document.querySelector(`.block.project[data-project-name="${project}"]`);
    if (toScrollTo) {
      const y = toScrollTo.getBoundingClientRect().top + window.scrollY;
      const navHeight = document.querySelector('body>nav').getBoundingClientRect().height;
      setTimeout(
        () => {
          window.scroll({
            top: y - navHeight - 10,
            behavior: 'smooth',
          });
        },
        /* window.innerWidth > mobileWidth */ false ? 200 : 0
      );
    }
  }
});
