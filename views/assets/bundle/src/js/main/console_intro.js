window.addEventListener('load', () => {
  // text
  const interestedInWorkingText = ' Interested in working with me? Shoot me an email at xtrp@xtrp.io. ';
  const beforeText = [' Built by...'];
  const asciiText = [
    '  ______            _               _                     ',
    ' |  ____|          | |     /\\      | |                    ',
    ' | |__ _ __ ___  __| |    /  \\   __| | __ _ _ __ ___  ___ ',
    " |  __| '__/ _ \\/ _` |   / /\\ \\ / _` |/ _` | '_ ` _ \\/ __|",
    ' | |  | | |  __/ (_| |  / ____ \\ (_| | (_| | | | | | \\__ \\',
    ' |_|  |_|  \\___|\\__,_| /_/    \\_\\__,_|\\__,_|_| |_| |_|___/',
    ' ',
  ];

  const fullText = beforeText.concat(asciiText);

  // log '=====...' separators
  const separator = '-'.repeat(Math.max(interestedInWorkingText.length, asciiText[0].length));
  console.log(separator);

  console.log('%c' + fullText.join('\n'), 'font-family: monospace;');

  // social links logged with theme color!
  __siteSocialLinks.forEach((link) => {
    console.log(
      `%c ${link.name}: ${link.url
        .replace(/http:\/\//g, '')
        .replace(/https:\/\//g, '')
        .replace(/mailto:/g, '')}`,
      `color: ${link.theme}`
    );
  });

  console.log(separator);

  // interested in working with me text
  console.log('%c' + interestedInWorkingText, 'font-weight: bold;');
  console.log(separator);
});
