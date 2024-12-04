@extends('welcome')
@section('content')

    <div class="mainContentBlock">
        <div class="container">
            <div class="container flex jcc txtc">
                <h1>Аренда строительного инструмента</h1>
            </div>

            <div class="mainSlider">
                <div class="w3-content w3-display-container">
                    <div class="imgSmt">
                    <img class="mySlides" src="/public/image/p1.jpg" >
                    <img class="mySlides" src="/public/image/p2.jpg" style="display: none">
                    <img class="mySlides" src="/public/image/p3.png" style="display: none">
                    </div>
                    <div class="aic w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
                         style="width:100%">
                        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        <div class="flex jcc aic" style="height: 40px;">
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                  onclick="currentDiv(1)"></span>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                  onclick="currentDiv(2)"></span>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                  onclick="currentDiv(3)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script>


</script>
