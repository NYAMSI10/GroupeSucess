<x-mail::message>


    Bonjour Mr/Mme {{nomuser($user['nom'])->nom}}
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


    <img src="{{asset('asset/img/logo.jpg')}}" width="50" height="50" style="margin-left: 5%">
    <br>
    {{ config('app.name') }}

</x-mail::message>

