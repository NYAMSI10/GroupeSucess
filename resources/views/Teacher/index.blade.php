@extends('Home.layout')



@section('content')
   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Noms et Prénoms </label>
                                    <input type="text" name="nom" class="form-control"
                                        value="{{  old('nom') }}">
                                    @error('nom')
                                        <div class="alert alert-danger">
                                            <span >{{ $message }}</span>
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
                                            <span >{{ $message }}</span>
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
                                            <span >{{ $message }}</span>
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
                                     
                                   @foreach($classe as $class)
                                 
                                    <div class="form-check" style="margin-left:2%">
                                    
                                  <input class="form-check-input" type="checkbox" name="classe[]" value="{{ old('$class->nom') }}"  >
                                  <label  >
                                  {{ $class->nom }}
 
                                       </label>
                                      </div>
                                    
                                      @endforeach
                                   
                                   
                                    
                                </div> 
                                 
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Selectionnez le(les) Matiére(s) </label>
                                     
                                   @foreach($matiere as $mat)
                                 
                                    <div class="form-check" style="margin-left:2%">
                                    
                                  <input class="form-check-input" type="checkbox" name="matiere[]" value="{{ old('$mat->nom') }}"  >
                                  <label  >
                                  {{ $mat->nom }}
 
                                       </label>
                                      </div>
                                    
                                      @endforeach
                                   

                                    
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
                                     
                                     @foreach($periode as $perio)
                                   
                                      <div class="form-check" style="margin-left:2%">
                                      
                                    <input class="form-check-input" type="checkbox" name="periode[]" value="{{ old('$perio->nom') }}"  >
                                    <label  >
                                    {{ $perio->nom }}
   
                                         </label>
                                        </div>
                                      
                                        @endforeach
                                     
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












