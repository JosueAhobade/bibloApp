
@extends('users.layout.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="/asset/img/hero/library-wallpaper.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h2 style="color: white;">Bibliothèque de <br>l'UG</h2>
                                
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="../img/bibl.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 offset-lg-3">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('images/' . $livre_new[0]->livre_image) }}" alt="" style=" max-width: 100%; height: auto;" >
                        </div>
                        <div class="banner__item__text">
                            <h2>{{ $livre_new[0]->titre }}</h2>
                           @if ($livre_new[0]->disponible &&  $livre_new[0]->idEtu == Auth()->user()->id)
                            <a href="#">Indisponible </a>
                            @elseif ($livre_new[0]->qte > 0)
                            <a href="ajout_panier{{$livre_new[1]->id}}">Emprunter </a>
                            @else
                            <a href="#">Indisponible </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('images/' . $livre_new[1]->livre_image) }}" alt="" style=" max-width: 100%; height: auto;">
                        </div>
                        <div class="banner__item__text">
                            <h2>{{ $livre_new[1]->titre }}</h2>
                            @if ($livre_new[1]->disponible &&  $livre_new[1]->idEtu == Auth()->user()->id)
                            <a href="#">Indisponible </a>
                            @elseif ($livre_new[1]->qte > 0)
                            <a href="ajout_panier{{$livre_new[1]->id}}">Emprunter </a>
                            @else
                            <a href="#">Indisponible </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last ">
                        <div class="banner__item__text h-50">
                            <h2>{{ $livre_new[2]->titre }}</h2>
                            @if ($livre_new[2]->disponible &&  $livre_new[2]->idEtu == Auth()->user()->id)
                            <a href="#">Indisponible </a>
                            @elseif ($livre_new[2]->qte > 0)
                            <a href="ajout_panier{{$livre_new[1]->id}}">Emprunter </a>
                            @else
                            <a href="#">Indisponible </a>
                            @endif
                        </div>
                        <div class="banner__item__pic h-50">
                            <img src="{{ asset('images/' . $livre_new[2]->livre_image) }}" alt="" style=" max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter=".all">Tous</li>
                        <li data-filter=".new-arrivals">Nouveautés</li>
                        <li data-filter=".new-sale">Les plus lus</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($livre_all as $book)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix all">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('images/' . $book->livre_image) }}">
                            @if ($book->disponible && $book->idEtu == Auth()->user()->id )
                            <span class="label" style="color: red">Indisponible</span>
                            @elseif ($book->qte > 0)
                            <span class="label" style="color: green">Disponible</span>
                            @else
                            <span class="label" style="color: red">Indisponible</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="#"><img src="/asset/img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $book->titre }}</h6>
                            @if (!$book->disponible)
                             <span style="color: green;"><a href="ajout_panier{{ $book->id }}" class="add-cart">Ajouter au panier</a></span>
                            <!-- <span style="color: green;"><a href="pageloan{{ $book->id }}" class="add-cart">Emprunter</a></span> -->
                            @endif
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($livre_new as $book)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('images/' . $book->livre_image) }}">
                            @if ($book->disponible && $book->idEtu == Auth()->user()->id )
                            <span class="label" style="color: red">Indisponible</span>
                            @elseif ($book->qte > 0)
                            <span class="label" style="color: green">Disponible</span>
                            @else
                            <span class="label" style="color: red">Indisponible</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="#"><img src="/asset/img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $book->titre }}</h6>
                            @if (!$book->disponible)
                             <span style="color: green;"><a href="ajout_panier{{ $book->id }}" class="add-cart">Ajouter au panier</a></span>
                            <!-- <span style="color: green;"><a href="pageloan{{ $book->id }}" class="add-cart">Emprunter</a></span> -->
                            @endif
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                 @foreach ($livre_best as $book)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-sale">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('images/' . $book->livre_image) }}">
                            @if ($book->disponible && $book->idEtu == Auth()->user()->id )
                            <span class="label" style="color: red">Indisponible</span>
                            @elseif ($book->qte > 0)
                            <span class="label" style="color: green">Disponible</span>
                            @else
                            <span class="label" style="color: red">Indisponible</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="#"><img src="/asset/img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $book->titre }}</h6>
                            @if (!$book->disponible)
                             <span style="color: green;"><a href="ajout_panier{{ $book->id }}" class="add-cart">Ajouter au panier</a></span>
                            <!-- <span style="color: green;"><a href="pageloan{{ $book->id }}" class="add-cart">Emprunter</a></span> -->
                            @endif
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    
    <!-- Latest Blog Section End -->

    @endsection