function insertHeader() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/header', true);
    xhr.onreadystatechange = function () {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById('header').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}