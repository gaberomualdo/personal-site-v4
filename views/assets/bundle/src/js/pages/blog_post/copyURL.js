const copyURL = (url) => {
  const textArea = document.createElement('textarea');
  textArea.value = url;

  textArea.style.position = 'fixed';
  textArea.style.display = 'none';

  document.body.appendChild(textArea);

  textArea.focus();
  textArea.select();

  try {
    document.execCommand('copy');
  } catch (err) {
    console.error(`Copying the URL '${url}' failed with error: ${err.message}`);
  }

  document.body.removeChild(textArea);
};
