<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GROUPE SUCCÈS +🎓🎓</title>
    <!-- Favicons -->
    <link href="{{asset('asset/img/logo.jpg')}}" rel="icon">
    <link href="{{asset('asset/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"><img src="{{asset('asset/img/logo.jpg')}}" alt="" srcset=""></h1>

        </div>
        <h3>Connexion</h3>
        @error('pass')
        <div class="alert alert-danger">
            <span>{{ $message }}</span>
        </div>
        @enderror

        <form class="m-t" role="form" action="{{route('user.save')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email">
                @error('email')
                <div class="alert alert-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" value="{{old('password')}}"
                       name="password">
                @error('password')
                <div class="alert alert-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="checkbox m-r-xs" style="margin-left: -40%;">
                                    <input type="checkbox" id="checkbox1" name="remember" style="margin-left: 0.5%;">
                                    <label for="checkbox1">
Se Souvenir de moi                                    </label>
                                </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Conexion</button>


        </form>


    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
