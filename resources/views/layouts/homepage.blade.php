<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ settings()->get("page_title") }}</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fullpage.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : '' }}">

<header>
    <div id="menu" class="container">
        <div class="row">
            <div class="col-5 text-end">
                <ul class="mb-0 list-unstyled">
                    <li data-menuanchor=""><a href="">Mieszkania</a></li>
                    <li data-menuanchor="o-inwestycji"><a href="#o-inwestycji">O inwestycji</a></li>
                    <li data-menuanchor="galeria"><a href="#galeria">Galeria</a></li>
                </ul>
            </div>
            <div class="col-2 text-center position-relative">
                <a href="" id="logo"><img src="{{asset('gfx/wislane-tarasy-logo.png') }}" alt="Logo inwestycji Wiślane Tarasy"></a>
            </div>
            <div class="col-5 text-start">
                <ul class="mb-0 list-unstyled">
                    <li data-menuanchor="lokalizacja"><a href="#lokalizacja">Lokalizacja</a></li>
                    <li data-menuanchor="o-nas"><a href="#o-nas">O nas</a></li>
                    <li data-menuanchor="kontakt"><a href="#kontakt">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div id="fullpage">
    <div class="section slider" data-url="" data-name="Slider">Slider</div>

    <div class="section o-inwestycji" data-url="o-inwestycji" data-name="O inwestycji">
        <div class="slide" id="wislane-tarasy">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">O INWESTYCJI</span>
                            <h2 class="title">WIŚLANE TARASY</h2>
                            <p>Inwestycja zlokalizowana będzie przy ul. Grzymalitów. Będzie składała się z 3 pięciokondygnacyjnych budynków mieszkalnych z garażem podziemnym jednokondygnacyjnym – dwa budynki punktowe i jeden w kształcie litery L, podzielony dylatacją. Rozwiązanie te znacząco wpłynie na atrakcyjność inwestycji.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Wygodna infrastruktura</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Widok na naturę <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="img-section">
                            <img src="{{asset('gfx/o-inwestycji.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="widok-na-nature">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">O INWESTYCJI</span>
                            <h2 class="title">Widok na naturę</h2>
                            <p>Od strony zachodniej zabudowa celowo posiada wolne przejścia między budynkami. Dzięki temu uzyskujemy układ urbanistyczny dziedzińca z kojącym widokiem - otwarciem na tereny zielone. Wewnętrzny dziedziniec zagospodarowano odpowiednio mieszając komunikację i projektowaną zieleń z elementami małej architektury, co tworzy przestrzeń funkcjonalną i atrakcyjną pod względem wizualnym.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Wiślane Tarasy</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Wypoczynek i rekreacja <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="img-section">
                            <img src="{{asset('gfx/o-inwestycji.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="wypoczynek-i-rekreacja">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">O INWESTYCJI</span>
                            <h2 class="title">Wypoczynek i rekreacja</h2>
                            <p>Dodatkowo, od strony zachodnio-południowej, zlokalizowano plac zabaw i urządzono miejsca wypoczynku oraz rekreacji dla mieszkańców. Obsługa komunikacyjna piesza i kołowa odbywać się będzie z drogi wewnętrznej na terenie inwestycji sąsiadującej, od strony południowej.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Widok na naturę</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Wygodna infrastruktura <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="img-section">
                            <img src="{{asset('gfx/o-inwestycji.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="wygodna-infrastruktura">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">O INWESTYCJI</span>
                            <h2 class="title">Wygodna infrastruktura</h2>
                            <p>Droga wewnętrzna posiada bezpośredni dojazd do ul. Grzymalitów. Zaprojektowano jeden wjazd na teren inwestycji – w południowo-zachodniej części działki – na terenie działki zaprojektowano drogę do garażu podziemnego oraz drogę pożarową, obsługującą kompleks budynków. Na terenie zapewniono również utwardzony teren dla pojazdu obsługującego stację transformatorową. Projektowane budynki zostaną podłączone do sieci miejskich: gazowej, kanalizacyjnej, energetycznej oraz teletechnicznej.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Wypoczynek i rekreacja</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">wislane-tarasy <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="img-section">
                            <img src="{{asset('gfx/o-inwestycji.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section o-nas" data-url="o-nas" data-name="O nas">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 m-0">
                <div class="col-6 p-0">
                    <div class="img-section">
                        <img src="{{asset('gfx/o-inwestycji.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                    <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                        <div class="row row-logo">
                            <div class="col-logo pe-5">
                                <img src="{{asset('gfx/prana-development-logo.png') }}" alt="Logo Prana Development">
                            </div>
                            <div class="col-logo ps-5">
                                <img src="{{asset('gfx/ferryman-development-logo.png') }}" alt="Logo firmy Ferryman Development sp. z o.o.">
                            </div>
                        </div>
                        <h2 class="title">Prana Development</h2>
                        <p>Prana Development Sp. z o.o. została powołana jako spółka celowa przez Ferryman Development sp. z o.o. w ramach projektu deweloperskiego pod nazwą Wiślane Tarasy. Zarząd Spółki, udziałowcy i osoby kluczowe posiadają wieloletnie doświadczenie w zarządzaniu, finansowaniu, realizacji i sprzedaży projektów deweloperskich.</p>
                        <div class="nav-section row">
                            <div class="col-12 d-flex justify-content-start">
                                <a href="https://ferryman.com.pl/" target="_blank" class="bttn bttn-icon bttn-icon-right" rel="nofollow">Grupa Ferryman <i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section galeria" data-url="galeria" data-name="Galeria">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 m-0">
                <div class="col-12 p-0">
                    <ul class="rslider mb-0 list-unstyled">
                        <li style="background-image: url('{{asset('uploads/gallery/images/image-1.jpg') }}')"></li>
                        <li style="background-image: url('{{asset('uploads/gallery/images/image-2.jpg') }}')"></li>
                        <li style="background-image: url('{{asset('uploads/gallery/images/image-3.jpg') }}')"></li>
                        <li style="background-image: url('{{asset('uploads/gallery/images/image-4.jpg') }}')"></li>
                        <li style="background-image: url('{{asset('uploads/gallery/images/image-5.jpg') }}')"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section lokalizacja" data-url="lokalizacja" data-name="Lokalizacja">
        <div class="slide" id="o-lokalizacji">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0">
                        <div id="map-section">
                            [ MAPA ]
                        </div>
                    </div>
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">LOKALIZACJA</span>
                            <h2 class="title">Idealne miejsce do odpoczynku</h2>
                            <p>Zespół budynków będzie znajdował się w cichej i bliskiej naturze okolicy. Tuż przy Wiśle, z uroczą ścieżką rowerową biegnącą od południa przez warszawę w kierunku północnym, wzdłuż zalesionego brzegu rzeki - Wałem Wiślanym.</p>
                            <p>To idealne miejsce do odpoczynku, rekreacji na świeżym powietrzu, z dala od miejskiego zgiełku a przy tym dobrze wietrzone z racji korytarzy powietrznych, czyli pasów wolnej przestrzeni i zieleni, które umożliwiają wymianę powietrza.</p>
                            <p>W pobliżu znajduje się Rezerwat Przyrody Ławice Kiełpińskie, Jeziorko z plażą, Bobrowisko oraz w okresie letnim przeprawa promowa na lewy brzeg Wisły. Pomimo miejskiej zabudowy, dużo zielni w tym Park Ireny Jarockiej.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Komunikacja</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Infrastruktura <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="infrastruktura">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0">
                        <div id="map-section">
                            [ MAPA ]
                        </div>
                    </div>
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">Lokalizacja</span>
                            <h2 class="title">Infrastruktura</h2>
                            <p>W okolicy znajdą się liczne osiedlowe sklepy, markety w tym Centrum
                                Handlowe Galeria Północna, apteki, obiekty użyteczności publicznej - przychodnie,
                                szkoły i przedszkola, obiekty sportowe. Nie zabraknie również miejsc rekreacyjnych -
                                restauracje i bary w tym pobliski bar letni przy Wale Wiślanym.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Lokalizacja</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Komunikacja <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="komunikacja">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 m-0">
                    <div class="col-6 p-0">
                        <div id="map-section">
                            [ MAPA ]
                        </div>
                    </div>
                    <div class="col-6 p-0 d-flex align-items-center justify-content-center">
                        <div class="text-section" data-aos="fade-up" data-aos-duration="500">
                            <span class="title-sub">Lokalizacja</span>
                            <h2 class="title">Komunikacja</h2>
                            <p>W okolicy znajdą się liczne osiedlowe sklepy, markety w tym Centrum
                                Handlowe Galeria Północna, apteki, obiekty użyteczności publicznej - przychodnie,
                                szkoły i przedszkola, obiekty sportowe. Nie zabraknie również miejsc rekreacyjnych -
                                restauracje i bary w tym pobliski bar letni przy Wale Wiślanym.</p>
                            <div class="nav-section row">
                                <div class="col-6">
                                    <button class="bttn bttn-icon bttn-icon-left" id="moveLeft"><i class="las la-angle-left"></i> Infrastruktura</button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button class="bttn bttn-icon bttn-icon-right" id="moveRight">Lokalizacja <i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section dlaczego-warto" data-url="dlaczego-warto" data-name="Dlaczego warto">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 m-0">
                <div class="col-12 p-0 d-flex align-items-center justify-content-center">
                    <div class="text-section w-100 text-center">
                        <span>WIŚLANE TARASY</span>
                        <h2 class="title">DLACZEGO WARTO</h2>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                                    <div class="atut-box">
                                        <img src="https://placehold.co/95x95" alt="">
                                        <h3>Ścieżka rowerowa <br>biegnąca <br>Wałem Wiślanym</h3>
                                    </div>
                                </div>
                                <div class="col" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                                    <div class="atut-box">
                                        <img src="https://placehold.co/95x95" alt="">
                                        <h3>Cicha okolica <br>wśród natury</h3>
                                    </div>
                                </div>
                                <div class="col" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                                    <div class="atut-box">
                                        <img src="https://placehold.co/95x95" alt="">
                                        <h3>Dogodna <br>komunikacja miejska</h3>
                                    </div>
                                </div>
                                <div class="col" data-aos="fade-up" data-aos-duration="500" data-aos-delay="700">
                                    <div class="atut-box">
                                        <img src="https://placehold.co/95x95" alt="">
                                        <h3>Duży garaż, <br>boksy rowerowe</h3>
                                    </div>
                                </div>
                                <div class="col" data-aos="fade-up" data-aos-duration="500" data-aos-delay="900">
                                    <div class="atut-box">
                                        <img src="https://placehold.co/95x95" alt="">
                                        <h3>Każde mieszkanie <br>posiada balkon <br>lub loggie</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section kontakt" data-url="kontakt" data-name="Kontakt">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 m-0">
                <div class="col-6 d-flex align-items-center">
                    <form method="post" action="" class="validateForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 form-input">
                                <label for="form_name">Imię<span class="text-danger">*</span></label>
                                <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-6 form-input">
                                <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-6 form-input">
                                <label for="form_phone">Telefon</label>
                                <input name="form_phone" id="form_phone" class="form-control" type="tel" value="{{ old('form_phone') }}">
                            </div>

                            <div class="col-12 mt-3 form-input">
                                <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            @foreach ($rules as $r)
                                <div class="col-12">
                                    <div class="regulki">
                                        <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                        <label for="zgoda_{{$r->id}}" class="rules-text">{!! $r->text !!}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row row-form-submit">
                            <div class="col-12 pt-4">
                                <div class="input">
                                    <input name="form_page" type="hidden" value="homepage">
                                    <script type="text/javascript">
                                        document.write("<button class=\"bttn bttn-icon bttn-icon-right\" type=\"submit\">WYŚLIJ WIADOMOŚĆ <i class=\"las la-angle-right\"></i></button>");
                                    </script>
                                    <noscript><p><b>Do poprawnego działania, Java musi być włączona.</b><p></noscript>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="kontakt-prana">
                        <div class="dane" data-aos="flip-left" data-aos-duration="500">
                            <div>
                                <img src="{{asset('gfx/prana-development-logo-square.png') }}" alt="Logo firmy Prana Development Sp. z o.o.">
                                <h2>Prana Development Sp. z o.o.</h2>
                                <p>ul. Budowlańców</p>
                                <p>00-634 Warszawa</p>
                                <p>&nbsp;</p>
                                <p>NIP: 000-000-00-00</p>
                                <p>REGON: 000000000</p>
                                <p>KRS: 0000000000</p>
                                <p>&nbsp;</p>
                                <p>konto@nazwa.pl</p>
                                <p>+ 48 123 456 789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.partials.cookies')

@include('inline.modal')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;800&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/app.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/leaflet.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/fullpage.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/validation.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/pl.js') }}" charset="utf-8"></script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@stack('scripts')

<script type="text/javascript">
    const multipage = {
        changeAddress: function( url ) {
            if( !url || url === '' ) {
                $.address.value('');
                const uri = window.location.toString();
                if (uri.indexOf("#") > 0) {
                    const clean_uri = uri.substring(0, uri.indexOf("#"));
                    window.history.replaceState({}, document.title, clean_uri);
                }
            }
            if( $.address.value().indexOf( url ) < 0 && !$("section[data-url="+url+"]").hasClass('one-page-content') && !$("section[data-url="+url+"]").hasClass('no-loading')){
                window.history.replaceState({}, document.title, url);
            }
        }
    };

    new fullpage('#fullpage', {
        controlArrows: false,
        scrollOverflow: false,
        responsiveWidth: 700,
        fixedElements: 'header',
        menu: '#menu',
        anchors:
            [
                'slider',
                'o-inwestycji',
                'o-nas',
                'galeria',
                'lokalizacja',
                'dlaczego-warto',
                'kontakt'
            ],
        lockAnchors: true,
        onLeave: function(origin, destination){
            const url = $('.section').eq(destination.index).data('url');
            multipage.changeAddress( url );
            if(destination.index !== 0) {
                $('header').addClass('bg');
            } else {
                $('header').removeClass('bg');
            }
            console.log('onLeave');
        },
        afterLoad : function(origin){
            $('.active .aos-init').addClass('aos-animate');
            console.log('afterLoad');
        },
        afterSlideLoad: function(){
            $('.slide.active .aos-init').addClass('aos-animate');
            console.log('afterSlideLoad');
        },
        onSlideLeave: function(){
            $('.aos-init').removeClass('aos-animate');
            console.log('onSlideLeave');
        },
        afterResize: function(){
            $('.active .aos-init').addClass('aos-animate');
            console.log('afterResize');
        },
        afterRender: function(){
            console.log('afterRender');

            AOS.init();
            const url = document.location.href.replace('{{ env('APP_URL') }}', '');
            if(url.length > 0) {
                const section = jQuery('.section[data-url=' + url + ']');
                if(section.length){
                    console.log('Move to: ' + url)
                    fullpage_api.moveTo(url);
                }
            }
        }
    });

    $(document).on('click', 'header li a', function(e) {
        e.preventDefault();
        const href = $(this).attr('href').substring(1);
        const section = jQuery('.section[data-url=' + href + ']');

        if (section.length) {
            console.log('Move to: ' + href)
            fullpage_api.moveTo(href);
        }
    });

    $(document).on('click', '#moveLeft', function(){
        fullpage_api.moveSlideLeft();
    });
    $(document).on('click', '#moveRight', function(){
        fullpage_api.moveSlideRight();
    });

    $(document).ready(function(){
        $(".rslider").responsiveSlides({auto:false, pager:false, nav:true, timeout:5000, random:false, speed: 500});

        $(".validateForm").validationEngine({
            validateNonVisibleFields: true,
            updatePromptsPosition:true,
            promptPosition : "topRight:-137px"
        });
    });
</script>
</body>
</html>
