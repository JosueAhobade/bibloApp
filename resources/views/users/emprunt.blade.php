
@extends('users.layout.app')

@section('content')
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Emprunts</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <table class="table table-striped">
        <thead>

            <tr>
                <th>Livre</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date de remise</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($pret as $prets)
            <tr>
                <td> <img src="{{ asset('images/' . $prets->livre_image) }}" alt="" style=" width: 50px; height: 50px;"></td>
                <td>{{ $prets->titre }}</td>
                <td>{{ $prets->auteur }}</td>
                <td>{{ $prets->dateRemise }}</td>
                <td  class="d-flex justify-content-center">
                    <form action="rendre_livre" method="post" id="formRestitution" 
                    onsubmit="return confirmerRestitution()">
                        @csrf
                        <input type="hidden" value="{{$prets->id}}" name="id_livre">
                        <button type="submit" class="btn btn-primary btn-xs">
                            <i class="fa fa-calendar"></i> Restituer 
                        </button>
                    </form>
                   
                    <a href="pageprolong{{ $prets->id }}" class="btn btn-success btn-xs">
                        <i class="fa fa-calendar-plus-o"></i> Prolonger 
                    </a>
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
        </div>
    </section>

    <script type="text/javascript">
        function confirmerRestitution() {
            // Utilisez la fonction JavaScript `confirm` pour afficher une boîte de dialogue de confirmation
            const confirmation = confirm("Êtes-vous sûr de vouloir restituer ce livre ?");

            // Vérifiez la réponse de l'utilisateur
            if (confirmation) {
                // Si l'utilisateur a cliqué sur "OK" dans la boîte de dialogue, laissez le formulaire se soumettre
                return true;
            } else {
                // Si l'utilisateur a cliqué sur "Annuler" dans la boîte de dialogue, annulez la soumission du formulaire
                return false;
            }
        }

    </script>
    <!-- Checkout Section End -->

   @endsection