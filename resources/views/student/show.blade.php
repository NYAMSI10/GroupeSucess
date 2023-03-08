@extends('Home.layout')



@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">

            <div class="ibox-content">
                <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Noms et Prénoms de l'élève </label>
                                <input type="text" name="nom" class="form-control"
                                       value="{{ $student->nom  }}">
                                @error('nom')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Etablissement de l'élève </label>
                                <input type="text" name="school" class="form-control"
                                       value="{{  $student->school }}">
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
                                <label class="form-label">Quartier </label>
                                <input type="text" name="quartier" class="form-control"
                                       value="{{  $student->quartier }}">
                                @error('quartier')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Numéro de téléphone du parent </label>
                                <input type="phone" class="form-control" name="tel"
                                       value="{{  $student->tel}}">
                                @error('tel')
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
                                <label class="form-label"> Selectionnez la classe de l'élève</label>



                                <select class="select2 form-control" name="classe">

                                    <option  value="{{ $idclasses->id }}">{{$idclasses->nom}}</option>

                                    @foreach(classes() as $class)
                                        @if($class->id != $idclasses->id )
                                        <option value="{{ $class->id }}">{{$class->nom}}</option>

                                        @endif
                                            @endforeach

                                </select>
                                @error('classe')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror


                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- <label for="files" class="form-label">
                                    <i class="fa fa-paperclip"></i>
                                    Ajouter des pièces jointes
                                </label>
                                <input type="file" class="form-control" id="files" name="files[]" multiple> -->
                                <label class="form-label"> Selectionnez le Période de Cours de l'élève </label>


                                <select class="select2 form-control" name="periode" >

                                    <option value="{{ $idperiodes->id }}">{{$idperiodes->nom}}</option>

                                    @foreach(periodes() as $period)
                                        @if($period->id != $idperiodes->id )
                                            <option  value="{{ $period->id }}">{{$period->nom}}</option>
                                        @endif
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
                                <label class="form-label"> Frais d'Inscription </label>
                                <input type="tel" class="form-control" name="inscription"
                                       value="{{  $student->inscription }}">
                                @error('inscription')
                                <div class="alert alert-danger">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Année Académique </label>
                                <input type="text" class="form-control" name="annee"
                                       value="{{$student->annee }}" >

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
