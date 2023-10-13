@extends('users.layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Livre</th>
                                    <th>Titre</th>
                                    <th>Quantité</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($panier as $id => $livre)
                                <tr>
                                    <input type="hidden" value="{{ $livre['id'] }}" name="idLivre">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset('images/' . $livre['image_livre']) }}" style="width: 50px; height: 50px;" alt="">
                                        </div>
                                        
                                    </td>
                                    <td class="product__cart__item"><div class="product__cart__item__text">
                                            <h6>{{ $livre['titre'] }}</h6>
                                            
                                        </div></td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{ $livre['quantite'] }}" name="qte">
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="cart__close"><a href="./delete{{ $livre['id'] }}"><i  class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="./index">Continuer les emprunts</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Panier total</h6>
                        <ul>
                            
                            <li>Total des livres <span>{{$nbreTotal}}</span></li>
                        </ul>
                        <a href="/emprunt" class="primary-btn">Emprunter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

   @endsection