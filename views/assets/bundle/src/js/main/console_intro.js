window.addEventListener('load', () => {
  const logToConsole = (text, customStyle = '', options = {}) => {
    console.log('%c' + (options.isSeparator ? '' : ' ') + text, customStyle + ' font-size: 120%;');
  };

  const interestedInWorkingText = 'Interested in working with me? Shoot me an email at xtrp@xtrp.io. ';
  const beforeText = ['Built by...'];
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
  const separator = '-'.repeat(Math.max(interestedInWorkingText.length, asciiText[0].length) + 1);
  logToConsole(separator, '', { isSeparator: true });

  logToConsole(fullText.join('\n'), 'font-family: monospace;');

  // social links logged with theme color!
  __siteSocialLinks.forEach((link) => {
    logToConsole(
      `${link.name}: ${link.url
        .replace(/http:\/\//g, '')
        .replace(/https:\/\//g, '')
        .replace(/mailto:/g, '')}`,
      `color: ${link.theme};`
    );
  });

  logToConsole(separator, '', { isSeparator: true });

  // interested in working with me text
  logToConsole(interestedInWorkingText, 'font-weight: bold;');
  logToConsole(separator, '', { isSeparator: true });
});
