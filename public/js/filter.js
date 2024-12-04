
$(document).ready(function (){

    $('#inputSearchPriceS').on('keyup', function () {
        showBtn($(this).val());
    });
    $('#inputSearchPriceB').on('keyup', function () {
        showBtn($(this).val());
    });
})

function showBtn(e){

    if (e!='') {
        let showBtn = document.getElementById("showBtn");
        showBtn.style.display = 'block';

        let showPrice = document.getElementById("showPrice");
        let coordinate = showPrice.getBoundingClientRect();

        showBtn.style.left = e.offsetWidth * 2.5 + coordinate.left + 'px';
        showBtn.style.top = coordinate.top - e.offsetHeight * 0.3 + 'px';

    }
    else{
        let showBtn = document.getElementById("showBtn");
        showBtn.style.display = 'none';
    }
}


