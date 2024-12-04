

function closeSearch() {
    let searchResult = document.getElementById('searchResult');
    let searchProduct = document.getElementById('searchProduct');
    let close = document.getElementById('closeInput');
    searchProduct.value = "";
    searchResult.style.display = "none";
    searchResult.innerHTML = "";
    close.style.display = 'none';
}
function closeSearch2() {
    let searchResult = document.getElementById('searchResult2');
    let searchProduct = document.getElementById('searchProduct2');
    let close = document.getElementById('closeInput2');
    searchProduct.value = "";
    searchResult.style.display = "none";
    searchResult.innerHTML = "";
    close.style.display = 'none';
}

