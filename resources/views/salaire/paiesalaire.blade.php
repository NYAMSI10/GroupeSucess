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
                    <form action="{{route('salaires.addsalaire', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms de l'enseignant </label>

                                    <input type="text" name="nom" class="form-control"
                                           value="{{  $user->nom }}" disabled>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Période de cours </label>
                                    <select class="select2 form-control" name="periode">
                                        <option value=" ">Choisir une période de cours </option>
                                        @foreach($perio as $period)
                                            @foreach(periodes() as $periode)
                                                @if($period->periode_id == $periode->id)

                                                    <option >{{$periode->nom}}</option>

                                                @endif
                                            @endforeach
                                        @endforeach

                                    </select>

                                    @error('periode')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror



                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nombre de scéance ou d'Heure éffectuée </label>
                                    <input type="text" class="form-control" name="nbrework"
                                           value="{{  old('nbrework') }}">

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
                                           value="{{  old('mtfrais') }}">
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
                                        <option value=" ">Choisir le mois de paiement</option>
                                        <option >JANVIER {{date("Y")}}</option>
                                        <option >FEVRIER {{date("Y")}}</option>
                                        <option>MARS {{date("Y")}}</option>
                                        <option >AVRIL {{date("Y")}}</option>
                                        <option >MAI {{date("Y")}}</option>
                                        <option >JUIN {{date("Y")}}</option>
                                        <option >JUILLET {{date("Y")}}</option>
                                        <option >AOUT {{date("Y")}}</option>
                                        <option >SEPTEMBRE {{date("Y")}}</option>
                                        <option >OCTOBRE {{date("Y")}}</option>
                                        <option>NOVEMBRE {{date("Y")}}</option>
                                        <option >DECEMBRE {{date("Y")}}</option>



                                    </select>
                                    @error('Mois ')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Amicale </label>
                                    <input type="text" class="form-control" name="amicale"
                                           value="{{  old('amicale') }}">

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
                                           value="{{  old('benefcotistion') }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Montant à cotiser </label>
                                    <input type="text" class="form-control" name="cotisation"
                                           value="{{  old('cotisation') }}">

                                </div>

                            </div>

                        </div>
                        <fieldset>
                            <legend><h3 class="ibox-title">Les PRIMES </h3></legend>
                        <div class="row">

                            @foreach($prime as $primes)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$primes->nom}} </label>
                                        <input type="text" class="form-control" name="prime[]"
                                                >

                                    </div>
                                </div>
                            @endforeach
                                @foreach($prime as $primese)

                                            <input type="hidden" class="form-control" name="primes[]"
                                            value="{{$primese->id}}">


                                @endforeach

                        </div>
                </fieldset>

                        <fieldset>
                            <legend><h3 class="ibox-title">Les Evénements  </h3></legend>
                            <div class="row">

                                @foreach($events as $event)
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
                            <button class="btn btn-md btn-primary pull-right" type="submit">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection












