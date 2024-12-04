<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>АрендаСтрой</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/slider.css">
    <link rel="stylesheet" href="/public/css/font-face.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/modal.css">
    <link rel="stylesheet" href="/public/css/catalog.css">
    <link rel="stylesheet" href="/public/css/cart.css">
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/pagination.css">
    <link rel="stylesheet" href="/public/css/search.css">
</head>
<body>

<header>
    <div class="container">
        <div class="flex aic jcsb p10">
            <div class="leftHead flex aic">
                <div class="nameCompany"><a href="/">АрендаСтрой</a></div>
                <div class="Catalog" id="mobMedia">
                    <span  class="nameCat" id="catalogOpen"  onclick="openCatalog()" >Каталог</span>
                    <div class="catalogMenu" id="cMenu">
                        @foreach(\App\Models\Category::get() as $cat)
                            <a href="{{route('showCatalog',$cat->id)}}" class="linkCat category">
                                <div class="nameCategory">
                                    {{ $cat->name }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="searchInput flex dhidden">
                <div class="wrap wall">
                    <div class="search">
                        <input type="text" class="searchTerm" id="searchProduct" onkeyup="searchProduct(this.value)"
                               placeholder="Поиск" name="search">
                        <i class="fas fa-times orangeText" id="closeInput" onclick="closeSearch()"></i>
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="dBlock">
                        <div class="searchResult" id="searchResult"></div>
                    </div>
                </div>
            </div>

            <div class="rightHead flex aic dhidden">
                <div class="About">
                    <a href="{{route('cartView')}}" id="basket" class="orangeText">
                        Корзина ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})
                    </a>
                </div>
                @guest
                    <div class="authBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span>Войти</span>
                    </div>
                @elseif(Auth::user()->role)
                    <div class="profileMenu">
                        <div class="authBtn" onclick="openProfile()">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="hideUserMenu" id="hideUserMenu">
                            <a class="orangeLink" href="{{ route('admin') }}">Админка</a>
                            <a class="orangeLink" href="{{ route('showOrder') }}">Заказы</a>
                            <a class="orangeLink" href="{{ route('signout') }}">Logout</a>
                        </div>
                    </div>
                @else
                    <div class="profileMenu">
                        <div class="authBtn" onclick="openProfile()">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="hideUserMenu" id="hideUserMenu">
                            <span><a href="{{route('getOrder')}}" class="orangeLink">Мои заказы</a></span>
                            <!--<span><a href="{ route('addOrderView') }}" class="orangeLink">Добавить</a></span>-->
                            <span> <a class="orangeLink" href="{{ route('signout') }}">Logout</a></span>
                        </div>
                    </div>
                @endguest
            </div>


            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox"/>
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>
                <ul class="menu__box">
                    <li>

                        <div class="searchInput">
                            <div class="wrap wall">
                                <div class="search">
                                    <input type="text" class="searchTerm" id="searchProduct2"
                                           onkeyup="searchProduct2(this.value)"
                                           placeholder="Поиск" name="search">
                                    <i class="fas fa-times orangeText" id="closeInput2"
                                       onclick="closeSearch2()"></i>
                                    <button type="submit" class="searchButton">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <div class="dBlock">
                                    <div class="searchResult" id="searchResult2"></div>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="Catalog" id="mobMediaActive">
                            <span  class="nameCat" onclick="openCatalog2()">Каталог</span>
                            <div class="catalogMenu" id="cMenu2">
                                @foreach(\App\Models\Category::get() as $cat)
                                    <a href="{{route('showProduct',$cat->id)}}" class="linkCat category">
                                        <div class="nameCategory">
                                            {{ $cat->name }}
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="About">
                            <a href="{{route('cartView')}}" id="basket" class="orangeText">
                                Корзина ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})
                            </a>
                        </div>
                    </li>
                    <li>

                        @guest
                            <div class="flex wall jcc">
                                <div class="authBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span>Войти</span>
                                </div>
                            </div>
                        @elseif(Auth::user()->role)

                            <div class="authBtn" onclick="openProfile()">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="dBlock" id="hideUserMenu">
                                <a class="orangeLink" href="{{ route('admin') }}">Админка</a>
                                <a class="orangeLink" href="{{ route('showOrder') }}">Заказы</a>
                                <a class="orangeLink" href="{{ route('signout') }}">Logout</a>
                            </div>

                        @else
                            <div class="dBlock">
                                <div class="authBtn" onclick="openProfile()">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="dBlock" id="hideUserMenu">
                                    <span><a href="{{route('getOrder')}}" class="orangeLink">Мои заказы</a></span>
                                    <!--<span><a href="{ route('addOrderView') }}" class="orangeLink">Добавить</a></span>-->
                                    <span> <a class="orangeLink" href="{{ route('signout') }}">Logout</a></span>
                                </div>
                            </div>
                        @endguest
                    </li>

                </ul>
            </div>
        </div>
    </div>
</header>

<main>

    @yield('content')

</main>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <ul class="tab-group">
                    <li class="tab active"><a href="#login">Авторизироваться</a></li>
                    <li class="tab "><a href="#signup">Зарегистрироваться</a></li>
                </ul>
                <div class="tab-content">
                    <div id="login">
                        <form action="{{route('loginCustom')}}" method="post">
                            @csrf
                            @error ('error')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="field-wrap">
                                <label>
                                    Email<span class="req"></span>
                                </label>
                                <input type="email" id="email" name="email"/>
                                @error ('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Пароль<span class="req"></span>
                                </label>
                                <input type="password" required id="password" class="form-control" name="password"/>
                                @error ('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                           <!-- <p class="forgot"><a href="#">Забыли пароль?</a></p>-->
                            <button type="submit" class="button button-block btnAuth">Войти</button>
                        </form>

                    </div>
                    <div id="signup">
                        <form action="{{route('registerCustom')}}" method="post">
                            @csrf
                            <div class="field-wrap">
                                <label>
                                    Имя<span class="req">*</span>
                                </label>
                                <input type="text" required id="name" class="form-control" name="name"/>
                                @error ('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Login<span class="req">*</span>
                                </label>
                                <input type="text" required id="login" class="form-control" name="login"/>
                                @error ('login')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Email<span class="req">*</span>
                                </label>
                                <input type="email" required id="email" class="form-control"
                                       name="email"/>
                                @error ('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Пароль<span class="req">*Минимум 6 символов!</span>
                                </label>
                                <input type="password" required id="password" class="form-control"
                                       name="password"/>
                                @error ('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Подтвердите <span class="req">пароль</span>
                                </label>
                                <input type="password" required id="password_confirmation" class="form-control"
                                       name="password_confirmation"/>
                            </div>

                            <button type="submit" class="button button-block">Зарегистрироваться</button>
                        </form>
                    </div>
                </div><!-- tab-content -->
            </div> <!-- /form -->
        </div>
    </div>
</div>

<footer class="m40 p10">
    <div class="container">
        <h1>Контакты</h1>
    </div>
    <div class="contactUs">
        <div class="container flex jcsb">
            <div class="card3">
                <h3>
                    Email
                </h3>
                <p class="orangeTextWithOutHover">
                    arendastroy@arenda.ru
                </p>
            </div>
            <div class="card3">
                <div class="dBlock">
                    <h3>
                        Номер телефона
                    </h3>
                    <p class="orangeTextWithOutHover">
                        8-355-245-02-26
                    </p>
                </div>
            </div>
            <div class="card3 ">
                <div class="dBlock">
                    <h3>
                        Адрес
                    </h3>
                    <p class="orangeTextWithOutHover">
                        г. Челябинск, ул. Энтузиастов, 17
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
<script src="/public/js/fontAwesome.js"></script>
<script src="/public/js/jQuery.js"></script>
<script src="/public/js/bootstrap.js"></script>
<script src="/public/js/Catalog.js"></script>
<script src="/public/js/filter.js"></script>
<script src="/public/js/modal.js"></script>
<script src="/public/js/search.js"></script>
<script src="/public/js/sliderMain.js"></script>


<script>


    function searchM(search, searchResult, close) {
        if (search == '') {
            searchResult.style.display = "none";
            close.style.display = 'none';
        } else {
            close.style.display = 'block';
            $.ajax({
                url: '{{route("search")}}',
                type: "get",
                data: {
                    search: search,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    searchResult.style.display = "block";
                    searchResult.innerHTML = "";
                    var arrayLength = data.length;
                    for (var i = 0; i < arrayLength; i++) {
                        searchResult.innerHTML += '<a href="/catalog/showProduct/' + data[i]['id'] + '" class="searchResultContent">' + data[i]['name'] + '</a>';
                    }
                },
                error: function () {
                    searchResult.innerHTML = (
                        '<span class="nameProduct">Пусто...</span>'
                    )
                }
            });
        }
    }

    function searchProduct(search) {
        let searchResult = document.getElementById('searchResult');
        let close = document.getElementById('closeInput');
        searchM(search, searchResult, close);
    }

    function searchProduct2(search) {
        let searchResult = document.getElementById('searchResult2');
        let close = document.getElementById('closeInput2');
        searchM(search, searchResult, close);
    }
</script>
</body>

</html>
