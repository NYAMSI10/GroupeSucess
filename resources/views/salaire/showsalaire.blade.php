@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <h5> FORMULAIRE DE PAIEMENT DU SALAIRE DE L'ENSEIGNANT </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{route('salaire.update', $salaire->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms de l'enseignant </label>

                                    <input type="text" name="nom" class="form-control"
                                           value="{{ users($salaire->user_id)->nom }}" disabled>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Période de cours </label>
                                    <select class="select2 form-control" name="periode">

                                        @foreach($perio as $period)

                                                @if(($period->periode_id == $salaire->periode))

                                                    <option selected value="{{$period->periode_id}}">{{nomperiode($period->periode_id)}}</option>
                                            @else
                                                <option value="{{$period->periode_id}}">{{nomperiode($period->periode_id)}}</option>

                                            @endif

                                        @endforeach



                                    </select>





                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nombre de scéance ou d'Heure éffectuée </label>
                                    <input type="text" class="form-control" name="nbrework"
                                           value="{{  $salaire->nbrework }}">

                                </div>
                                @error('Nombresceance')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Montant par scéance ou par heure </label>
                                    <input type="text" class="form-control" name="mtfrais"
                                           value="{{  $salaire->mtfrais }}">
                                </div>
                                @error('Montantsceance')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mois de paiement </label>
                                    <select class="select2 form-control" name="mois" >
                                        @foreach(moise() as $mois)

                                            @if($mois == $salaire->mois)

                                                <option selected="selected">{{$salaire->mois}}</option>
                                            @else
                                                <option >{{$mois}}</option>

                                            @endif
                                        @endforeach


                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Amicale </label>
                                    <input type="text" class="form-control" name="amicale"
                                           value="{{  $salaire->amical }}">

                                </div>
                                @error('amicale')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Montant du Bénéficiaire de la cotisation </label>
                                    <input type="text" class="form-control" name="benefcotistion"
                                           value="{{  $salaire->benefcotistion }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Montant à cotiser </label>
                                    <input type="text" class="form-control" name="cotisation"
                                           value="{{  $salaire->cotisation }}">

                                </div>

                            </div>

                        </div>
                        <fieldset>
                            <legend><h3 class="ibox-title">Les PRIMES </h3></legend>
                            <div class="row">

                                @foreach(primes() as $prime)
                                 @foreach(primeusers() as $primeuser)
                                     @if(($prime->id == $primeuser->prime_id) && ($primeuser->mois == $salaire->mois) && ($primeuser->user_id == $salaire->user_id))
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{$prime->nom}} </label>
                                                    <input type="text" class="form-control" name="prime[]"
                                                           value="{{$primeuser->montant}}"

                                                    >

                                                </div>
                                            </div>

                                     @endif


                                    @endforeach
                                @endforeach

                                    @foreach(primes() as $primese)

                                        <input type="hidden" class="form-control" name="primes[]"
                                               value="{{$primese->id}}">


                                    @endforeach


                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><h3 class="ibox-title">Les Evénements  </h3></legend>
                            <div class="row">

                                @foreach(events() as $event)

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">{{$event->nom}} </label>
                                            <input type="text" class="form-control" name="events[]"
                                                   value="{{$event->montant}}" >

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </fieldset>
                        <br>
                        <div class="form-group" style="margin-right: 47%;">
                            <button class="btn btn-md btn-primary pull-right" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection












