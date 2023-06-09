@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <h5>  FORMULAIRE D'INSCRIPTION DES ELEVES  </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms de l'élève </label>
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
                                    <label class="form-label"> Etablissement de l'élève </label>
                                    <input type="text" name="school" class="form-control"
                                           value="{{  old('school') }}">
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
                                    <label class="form-label"> Numéro de téléphone du parent </label>
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
                                    <label class="form-label"> Selectionnez la classe de l'élève</label>



                                        <select class="select2 form-control" name="classe">
                                            <option value=" ">Choisir une classe</option>

                                        @foreach(classes() as $class)
                                                <option value="{{ $class->id }}">{{$class->nom}}</option>
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
                                        <option value=" ">Choisir une période de cours</option>
                                    @foreach(periodes() as $period)
                                            <option value="{{ $period->id }}">{{$period->nom}}</option>
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
                                           value="{{  old('inscription') }}">
                                    @error('inscription')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Déja payer les frais de Rame de papier? </label>

                                    <select class="select2 form-control" name="rame" required >
                                        <option value=" ">Choisir une option</option>
                                        <option value="1">oui</option>
                                        <option value="0">Non</option>


                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Année Académique </label>
                                <input type="text" class="form-control" name="annee"
                                       value="{{annees()}}" disabled>

                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="form-group" style="margin-right: 47%;">
                            <button class="btn btn-md btn-primary pull-right" type="submit">Valider</button>
                        </div>
                        <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection












