@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms </label>
                                    <input type="text" name="nom" class="form-control"
                                           value="{{  $user->nom}}">
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
                                           value="{{   $user->email }}">
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
                                           value="{{   $user->quartier }}">
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
                                           value="{{   $user->tel }}">
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
                                            @foreach($classusers as $classe)

                                                @if($class->id == $classe->classe_id)
                                                    <option  selected="selected"  value="{{ $classe->id }}">{{$class->nom}}</option>

                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Selectionnez le(les) Matiére(s) </label>

                                    <select class="select2 form-control" name="matiere[]" multiple="multiple">
                                        @foreach(matieres() as $mat)
                                            @foreach($matiereusers as $matiere)

                                                @if($mat->id == $matiere->matiere_id)
                                                    <option  selected="selected"  value="{{ $matiere->id }}">{{$mat->nom}}</option>

                                                @endif
                                            @endforeach
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
                                        @foreach(periodes() as $periode)
                                        @foreach($periodusers as $period)

                                             @if($periode->id == $period->periode_id)
                                            <option  selected="selected"  value="{{ $period->id }}">{{$periode->nom}}</option>

                                                @endif
                                        @endforeach
                                        @endforeach
                                    </select>



                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Role </label>
                                    <select class="form-control" name="role">
                                        @if($user->is_admin == 1)
                                            <option value="1">Administrateur</option>
                                            <option value="0"></option>
                                        @else
                                            <option value="0"></option>
                                            <option value="1">Administrateur</option>
                                        @endif
                                    </select>
                                    @error('service')
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












