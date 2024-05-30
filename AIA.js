function fetchDataFromPHP() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'cal.php', true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      var response = xhr.responseText;
      // Process the response data here using JavaScript
    }
  };
  xhr.send();
}
fetchDataFromPHP();
