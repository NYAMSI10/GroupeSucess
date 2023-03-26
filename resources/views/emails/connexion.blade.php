<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Bonjour Mr/Mme {{$user['nom']}}

<p> Le GroupeSucess+ a le plaisir de vous informer de la creation de votre espace profession.
    Voici vos paramètre de connexion: </p>
<br>
<p> Email : <strong> {{$user['email']}}</strong> </p>
<br>
<p> Mot de passe : <strong> {{$user['password']}}</strong> </p>
<br>
Veuillez vous connecter en clique sur ce bouton


<button type="submit" class="btn-primary">Connexion</button>



<img src="{{asset('asset/img/logo.jpg')}}" width="50" height="50" style="margin-left: 5%">

<br>
{{ config('app.name') }}
</body>
</html>
