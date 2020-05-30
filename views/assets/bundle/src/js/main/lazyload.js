// create lazyload object
// some code taken from Ori Drori on https://stackoverflow.com/questions/46877244/extract-all-url-links-from-css-file
module.exports = {
  getURLsFromCSS: (styles) => {
    var parser = new CSSParser();
    var sheet = parser.parse(styles, false, true);
    return [sheet.rules].reduce((urls, { style }) => {
      var url = style.backgroundImage.match(/url\(\"(.+)\"\)/);

      url && urls.push(url[1]);

      return urls;
    }, []);
  },
  update: (selector) => {
    Array.from(document.querySelectorAll(selector)).forEach(function (element) {
      if (!element.classList.contains('loaded') && element.hasAttribute('data-src')) {
        // load image and display when loaded
        var img = new Image();
        img.onload = function () {
          element.setAttribute('src', element.getAttribute('data-src'));
        };
        img.src = element.getAttribute('data-src');
      }
    });
  },
};
