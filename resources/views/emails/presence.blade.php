<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img class="img-responsive" src="img/header.jpg"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Bonjour Mr/Mme {{nomuser($user['nom'])->nom}}
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        @if($user['accept'] == 1)
                                            <p> Le GroupeSucess+ vous remercie de votre présence au cours en classe de

                                                <strong>{{nomclas($user['classe'])}}</strong>  de  <strong>{{$user['start']}} </strong> à
                                                <strong>{{$user['end']}}</strong>
                                            </p>
                                            <br>
                                        @elseif($user['accept'] == 0)
                                            <p> Le GroupeSucess+ constate avec tristesse  votre absence au cours en classe de

                                                <strong>{{nomclas($user['classe'])}}</strong>  de  <strong>{{$user['start']}} </strong> à
                                                <strong>{{$user['end']}} </strong>
                                            </p>
                                            <br>

                                        @endif

                                    </td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table>

        </td>
        <td></td>
    </tr>
</table>


<img src="{{asset('asset/img/logo.jpg')}}" width="50" height="50" style="margin-left: 5%">
<br>
{{ config('app.name') }}

</body>
</html>
