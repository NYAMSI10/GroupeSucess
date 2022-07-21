@extends('Home.layout')

@section('content')
<div class="breadcrumb">
                    <h1>Matiére</h1>
                    <ul>
                        <li><a href="href">Forms</a></li>
                        <li>Validation</li>
                    </ul>
                </div>
                @if(session('sucess'))
                <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize " style="margin-left: 40%;" > {{session('sucess')}} </strong> 
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                    @endif
                <div class="separator-breadcrumb border-top"></div>
<div class="col-md-20">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form class="needs-validation" novalidate="novalidate" action="{{route('save')}}" method="post">
                                @csrf    
                                <div class="form-row">
                                        <div class="col-md-4 mb-3" style="margin-left: 30%;">
                                            <label for="validationCustom01">Nom de la matiére</label>
                                            <input class="form-control" id="validationCustom01" type="text"  name="nom"  placeholder="Entrez le nom de la matiére" value="{{old('nom')}}" required="required" />
                                            <div class="invalid-tooltip">
                                                   Remplissez ce champ

                                                </div>
                                        </div>
                                       
                                    </div>
                                   <br>
                    
                                   
                                    <button class="btn btn-primary"  style="margin-left: 40%;"  type="submit" >Valider</button>
                                </form>

                            </div>
                        </div>
                    </div>

                    


@endsection