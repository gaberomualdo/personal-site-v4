window.addEventListener('load', () => {
  const logToConsole = (text, customStyle = '', options = {}) => {
    console.log('%c' + (options.isSeparator ? '' : ' ') + text, customStyle + ' font-size: 120%;');
  };

  const interestedInWorkingText = 'Interested in working with me? Shoot me an email at xtrp@xtrp.io. ';
  const beforeText = ['Built by...'];
  const asciiText = [
    '   _____          ____  _____  _____ ______ _',
    '  / ____|   /\\   |  _ \\|  __ \\|_   _|  ____| |',
    ' | |  __   /  \\  | |_) | |__) | | | | |__  | |',
    ' | | |_ | / /\\ \\ |  _ <|  _  /  | | |  __| | |',
    ' | |__| |/ ____ \\| |_) | | \\ \\ _| |_| |____| |____',
    '  \\_____/_/    \\_\\____/|_|  \\_\\_____|______|______|',
    '  _____   ____  __  __ _    _         _      _____   ____  ',
    ' |  __ \\ / __ \\|  \\/  | |  | |  /\\   | |    |  __ \\ / __ \\ ',
    ' | |__) | |  | | \\  / | |  | | /  \\  | |    | |  | | |  | |',
    ' |  _  /| |  | | |\\/| | |  | |/ /\\ \\ | |    | |  | | |  | |',
    ' | | \\ \\| |__| | |  | | |__| / ____ \\| |____| |__| | |__| |',
    ' |_|  \\_\\\\____/|_|  |_|\\____/_/    \\_\\______|_____/ \\____/ ',
    '',
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
