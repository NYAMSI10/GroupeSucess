@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <h5> FORMULAIRE DE PAIEMENT DES COURS DE SOUTIENS </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('students.updatefrais', $school->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms de l'élève </label>

                                    <input type="text" name="nom" class="form-control"
                                           value="{{  $student->nom }}" disabled>
                                    @error('nom')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Classe de l'élève </label>
                                    @foreach(classes() as $class)
                                        @if($class->id == $student->classe_id )
                                            <input type="text" name="school" class="form-control"
                                                   value="{{$class->nom}}" disabled>

                                        @endif
                                    @endforeach
                                    @error('school')
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
                                    <label class="form-label">période de cours de l'élève </label>
                                    @foreach(periodes() as $period)
                                        @if($period->id == $student->periode_id )
                                            <input type="text" name="school" class="form-control"
                                                   value="{{$period->nom}}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Frais de cours </label>
                                    <input type="text" class="form-control" name="frais"
                                           value="{{  $school->frais }}">
                                    @error('frais')
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
                                    <label class="form-label">Somme avancée / Total </label>
                                    <input type="text" class="form-control" name="avance"
                                           value="{{ $school->avance }}">
                                    @error('avance')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mois de paiement </label>
                                    <select class="select2 form-control" name="mois" >

                                        <option selected="selected" >{{$school->mois}}</option>
                                        @foreach(moise() as $mois)
                                            @if( $mois != $school->mois)
                                                <option> {{$mois}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('mois')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>


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












