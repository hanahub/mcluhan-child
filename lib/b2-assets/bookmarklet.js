function copyStringToClipboard(str) {
  // Create new element
  var el = document.createElement('textarea');
  // Set value (string to be copied)
  el.value = str;
  // Set non-editable to avoid focus and move outside of view
  el.setAttribute('readonly', '');
  el.style = {position: 'absolute', left: '-9999px'};
  document.body.appendChild(el);
  // Select text inside element
  el.focus();
  el.setSelectionRange(0, el.value.length)
  // Copy text to clipboard
  document.execCommand('copy');
  // Remove temporary element
  document.body.removeChild(el);
}

function copy_to_clipboard() {
  var copyText = document.getElementById("alink");
  copyStringToClipboard(copyText.innerText);
}

document.body.innerHTML += '<button onclick="copy_to_clipboard()">Copy</button>';