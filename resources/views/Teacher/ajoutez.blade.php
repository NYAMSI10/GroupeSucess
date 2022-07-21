@extends('Home.layout')

@section('content')
@if(session('sucess'))
                <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize " style="margin-left: 40%;" > {{session('sucess')}} </strong> 
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                    @endif
                    
<div class="col-md-20">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Formulaire</div>
                                <form class="needs-validation" novalidate="novalidate" action="{{route('saveteacher')}}" method="post">

                                @csrf
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Nom et prenom</label>
                                            <input class="form-control" id="validationTooltip01" type="text" placeholder="Nom et Prenom" name="nom"   value="{{old('nom')}}" required="required" />
                                            <div class="invalid-tooltip">
                                                Remplissez ce champs

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip02">Email</label>
                                            <input class="form-control" id="validationTooltip02" type="email" placeholder="Email" name="email"   value="{{old('email')}}"required="required" />
                                            <div class="invalid-tooltip">
                                                Remplissez ce champs

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltipUsername">Numéro de Téléphone</label>
                                           
                                               
                                                <input class="form-control" id="validationTooltipUsername" type="tel" placeholder="Tel"   name="tel"   value="{{old('tel')}}" aria-describedby="validationTooltipUsernamePrepend" required="required" />
                                                <div class="invalid-tooltip">
                                                Remplissez ce champs

                                             
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip03">Quartier</label>
                                            <input class="form-control" id="validationTooltip03" type="text"    placeholder="Quatier"  name="quartier"   value="{{old('quartier')}}" required="required" />
                                            <div class="invalid-tooltip">
                                            Remplissez ce champs

                                            </div>
                                        </div>
                                     
                                       
                                    </div>
                                   

                                    <div class="form-row">

                                        <div class="col-md-12 ">
                                        
                                        <label >Selectionnez la(les) classe(s) </label>
                                             

                                              <div class="row">
                                      <?php foreach($clas as $class) {
                                      
                                        
                                          
                               
							   ?>       
                                      <div class="form-check" style="margin-left:2%">
  <input class="form-check-input" type="checkbox" name="classe[]" value="<?= $class->idclasse   ?>" >
  <label  >
 <?= $class->nom   ?> 
  </label>
</div>
<?php  }   ?>                                           
                                        </div>
<br>
                                        <div class="col-md-12 " style="margin-left:-1.5% ;">
                                      
                                        <label >Selectionnez le(les) Matiére(s) </label>
                                              

                                              <div class="row">
                                      <?php foreach($mat as $mate) {
                                      
                                        
                                          
                               
							   ?>       
                                      <div class="form-check" style="margin-left:2%">
  <input class="form-check-input" type="checkbox" name="matiere[]" value=" <?= $mate->idmatiere   ?>"  >
  <label  >
 <?= $mate->nom   ?> 
 
  </label>
</div>
   
    

<?php  }   ?>                 

     
                                        </div>
                                       
                                    </div>
                                    <br>
                                        <div class="col-md-12 " style="margin-left:-1.5% ;">
                                      
                                        <label >Période de cours</label>
                                              

                                              <div class="row">
                                              <?php foreach($periode as $period) {
                                      
                                        
                                          
                               
                                      ?>
                                      <div class="form-check" style="margin-left:2%">
  <input class="form-check-input" type="checkbox" name="periode[]" value="<?= $period->idperiode   ?> "  >
  <label >
  <?= $period->nom   ?> 
 
  </label>
</div>
<?php  }   ?>
   
                    

     
                                        </div>
                                       
                                    </div>
                                    <br>

                                    <button class="btn btn-primary"  style="margin-left: 40%;"  type="submit">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>














































@endsection