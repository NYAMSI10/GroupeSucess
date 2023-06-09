@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms </label>
                                    <input type="text" name="nom" class="form-control"
                                           value="{{  old('nom') }}">
                                    @error('nom')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> E-mail </label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{  old('email') }}">
                                    @error('email')
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
                                           value="{{  old('quartier') }}">
                                    @error('quartier')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Numéro de téléphone </label>
                                    <input type="phone" class="form-control" name="tel"
                                           value="{{  old('tel') }}">
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
                                    <label class="form-label"> Selectionnez la(les) classe(s)</label>



                                        <select class="select2 form-control" name="classe[]" multiple="multiple">
                                            @foreach(classes() as $class)
                                                <option value="{{ $class->id }}">{{$class->nom}}</option>
                                            @endforeach

                                        </select>



                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Selectionnez le(les) Matiére(s) </label>




                                        <select class="select2 form-control" name="matiere[]" multiple="multiple">
                                            @foreach(matieres() as $mat)
                                                <option value="{{ $mat->id }}">{{$mat->nom}}</option>
                                            @endforeach

                                        </select>



                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <!-- <label for="files" class="form-label">
                                        <i class="fa fa-paperclip"></i>
                                        Ajouter des pièces jointes
                                    </label>
                                    <input type="file" class="form-control" id="files" name="files[]" multiple> -->
                                    <label class="form-label"> Selectionnez le(les) Période(s) de Cours </label>


                                    <select class="select2 form-control" name="periode[]" multiple="multiple">
                                        @foreach(periodes() as $period)
                                        <option value="{{ $period->id }}">{{$period->nom}}</option>
                                        @endforeach

                                    </select>


                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Role </label>
                                    <select class="form-control select2" name="role" >
                                        <option value="0">Enseignant</option>
                                        <option value="1">Administrateur</option>

                                    </select>
                                    @error('service')
                                    <div class="alert alert-danger">
                                        <span >{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
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












