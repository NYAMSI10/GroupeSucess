@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form action="{{ route('classe.update', $classe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6" style="margin-left: 30%">
                                <div class="form-group">
                                    <label class="form-label " style="margin-left: 30%"> Noms de la classe </label>
                                    <input type="text" name="nom" class="form-control" value="{{  $classe->nom}}">
                                    @error('nom')
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
    </div>
    </div>
@endsection
