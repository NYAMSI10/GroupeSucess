@extends('Home.layout')


@section('links')


@endsection




@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Compte Utilisateur</h2>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            @foreach(user() as $user)

                <div class="col-lg-3">
                    <div class="contact-box center-version" style="width: 110%">

                        <a href="#">

                            @if($user->image != null)
                                <img alt="image" class="img-circle" src="{{asset('photo/'.$user->image)}}">
                            @else
                                <img alt="image" class="img-circle" src="{{asset('photo/profile.png')}}">
                            @endif

                            <h3 class="m-b-xs"><strong>{{$user->nom}}</strong></h3>

                            <div class="font-bold">Enseignant</div>


                            <address class="m-t-md">
                                {{$user->quartier}}<br>
                                {{$user->tel}}<br>
                            </address>

                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                @if($user->active == 1)
                                    <a class="btn btn-xs btn-primary" disabled
                                       href="{{route('users.actif', $user->id)}}"><i class="fa fa-user"></i> Active </a>
                                @else
                                    <a class="btn btn-xs btn-primary" href="{{route('users.actif', $user->id)}}"><i
                                            class="fa fa-user"></i> Active </a>

                                @endif

                                @if($user->active == 1)
                                    <a class="btn btn-xs btn-warning" href="{{route('users.desactif', $user->id)}}"><i
                                            class="fa fa-user-times"></i> Désactive</a>
                                @else
                                    <a class="btn btn-xs btn-warning" disabled
                                       href="{{route('users.desactif', $user->id)}}"><i class="fa fa-user-times"></i>
                                        Désactive</a>

                                @endif
                                <a class="btn btn-xs btn-danger" href="{{ route('users.delete', $user->id)}}"
                                   onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur?')"><i
                                        class="fa fa-trash"></i> Delete</a>

                            </div>
                        </div>


                    </div>
                </div>

            @endforeach


        </div>
    </div>

@endsection





