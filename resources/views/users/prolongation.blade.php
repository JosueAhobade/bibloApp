
@extends('users.layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Prolonger emprun</h4>
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
                    <div class="cart__discount">
                        <h6>Nouvelle date de restitution du livre</h6>
                        <form action="/prolongation" method="post">
                            @csrf
                            <input type="hidden" value="{{$model->id}}" name="idLivre">
                            <input type="hidden" value="{{$model->dateRemise}}" id="dateRemise">
                            <input type="date" id="date" name="dateRemise" required="">
                            <button type="button" id="submit-button" onclick="checkDate()" >Confirmer emprunt</button>

                        </form>

                         <p id="message" style="color: red"></p>
                    </div>
                    
                </div>

                <div class="col-lg-4">
                     <img src="{{ asset('images/' . $model->livre_image) }}" alt="" style=" max-width: 100%; height: auto;">
                    
                </div>
            </div>
        </div>
    </section>

   <script>
        function checkDate() {
            // Récupérez la date saisie dans le champ de date
            var dateSaisie = new Date(document.getElementById("date").value);
            // Récupérez la date courante
            var dateCourante = new Date(document.getElementById("dateRemise").value);

            if (isNaN(dateSaisie)) {
                // La date n'est pas valide (l'utilisateur n'a pas saisi de date)
                document.getElementById("message").innerHTML = "Veuillez saisir une date de remise.";
            }

            else if (dateSaisie > dateCourante) {
                // La date saisie est valide
                // Si la date est valide, vous pouvez soumettre le formulaire
                document.querySelector('form').submit();
            } else {
                // La date saisie est invalide
                document.getElementById("message").innerHTML = "La nouvelle date doit être postérieure à l'ancienne date.";
            }
        }
    </script>

    <!-- Shopping Cart Section End -->

    @endsection