<x-mail::message>


Bonjour Mr/Mme {{$user['nom']}}

<p> Le GroupeSucess+ a le plaisir de vous informer de la creation de votre espace profession.
   Voici vos paramètre de connexion: </p>
    <br>
    <p> Email : <strong> {{$user['email']}}</strong> </p>
    <br>
    <p> Mot de passe : <strong> {{$user['password']}}</strong> </p>
<br>
    Veuillez vous connecter en clique sur ce bouton
<x-mail::button :url="$url" color="success">
Connexion
</x-mail::button>

    <img src="{{asset('asset/img/logo.jpg')}}" width="50" height="50" style="margin-left: 5%">

    <br>
{{ config('app.name') }}
</x-mail::message>
