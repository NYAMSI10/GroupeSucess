<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GROUPE SUCCÈS +🎓🎓</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('asset/img/logo.jpg')}}" rel="icon">
  <link href="{{asset('asset/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

  
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
    
    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/65eb163cd4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    
   <style>

   th
   {
     font-size: 15px;
   } 

   td
   {
    font-size: 13px;
   }
   </style>
</head>

<body >
                <div class="wrapper wrapper-content p-xl" id="invoice">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-7">
                                <img src="{{asset('asset/img/logo.jpg')}}" class="logo">

                                </div>

                                <div class="col-sm-20 text-right" style="margin-left: 10%;">
                                <h1 class="document-type text-navy">Bulletin de Paie</h1>

                                    <h4 >15 {{$salaire->mois}}</h4>
                                    
                                </div>
                                <br>
                                <br>

                                <div class="col-5 text-right" style="margin-left: 20%; margin-top:1%;font-size: 12px;">
          
          <p style="width: 150%;" style="font-size: 15px;">
          
            Nom Employé : <em><strong>{{users($salaire->user_id)->nom}}</strong></em><br>
            Département : 
            @foreach(matiereuserse($salaire->user_id) as $matiere)
              @foreach(matieres() as $mat)
              @if($mat->id == $matiere->matiere_id)
            <em><strong>{{$mat->nom}}</strong></em>
            @endif
            @endforeach
            @endforeach
            <br>
            Période de cours : <em><strong>{{nomperiode($salaire->periode)}}</strong></em>
          </p>
        </div>
                            </div>

                            

                            <table class="table table-striped" style="margin-top: 2%;">
        <thead>
          <tr>
            <th class="text-center">Description</th>
            <th class="text-center">nbre de Scéance ou d'Heure</th>
            <th class="text-center">Prix par Scéance ou par d'Heure</th>
            
            <th class="text-center">Total</th>
          </tr>
        </thead>
        <tbody >
          <tr >
            <td>Cours dispensés</td>
            <td class="text-center">{{$salaire->nbrework}}</td>
            <td class="text-center">{{$salaire->mtfrais}} FCFA</td>
            <td class="text-center" style="width: 20%;"> {{$salaire->mtfrais * $salaire->nbrework}} FCFA  </td>
          
          </tr>
          <tr>
            <td>Amicale</td>
            <td class="text-center">/</td>
            <td class="text-center">/</td>
            <td class="text-center" style="width: 20%;"> {{($salaire->amical  == null)? 0 : $salaire->amical }} FCFA </td>
           
          </tr>
          <tr>
            <td>cotisation</td>
            <td class="text-center">/</td>
            <td class="text-center">/</td>
            <td class="text-center" style="width: 20%;"> {{($salaire->cotisation == null)? 0 : $salaire->cotisation}} FCFA </td>
           
          </tr>
          <tr>
            <td>Bénéficiaire Cotisation</td>
            <td class="text-center">/</td>
            <td class="text-center">/</td>
            <td class="text-center" style="width: 20%;"> {{ ($salaire->benefcotisation == null)? 0 : $salaire->benefcotisation }} FCFA </td>
           
          </tr>
         
  
          @foreach(primes() as $prime)
                                   @foreach(primeusers() as $primeuser)
                                       @if(($prime->id == $primeuser->prime_id) && ($primeuser->mois == $salaire->mois) && ($primeuser->user_id == $salaire->user_id))
                                            <tr >
            <td> {{$prime->nom}}</td>
            <td class="text-center">/</td>
            <td class="text-center">/</td>
            <td class="text-center" style="width: 20%;">{{($primeuser->montant == null)? 0 : $primeuser->montant }} FCFA  </td>
          
          </tr> 
  
                                       @endif
  
  
                                      @endforeach
                                  @endforeach
  
  
                                  @foreach(events() as $event)
                                  <tr >
            <td> {{$event->nom}}</td>
            <td class="text-center">/</td>
            <td class="text-center">/</td>
            <td class="text-center" style="width: 20%;">{{$event->montant}}FCFA  </td>
          
          </tr> 
  
  
     @endforeach
          
        </tbody>
      </table>
      <div class="row">
        <div class="col-8">
        </div>
        <div class="col-4">
          <table class="table table-sm text-right"  style="margin-left: -8%;">
            <tr>
              <td> <strong>Net à payer : </strong></td>
              <td class="text-center"><em><strong>{{$salaire->montantsalaire}} FCFA</strong></em></td>
            </tr>
            
          </table>
        </div>
       </div>
       
    </div>
                </div>  
    <a href="#" id="download" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

   
  <script>
    window.onload = function(){
      document.getElementById("download")
      .addEventListener("click",()=> {
       const invoice = this.document.getElementById("invoice");
     var opt = {
      filename:     'Bulletin/de/paie/<?php echo users($salaire->user_id)->nom   ?>',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'A3', orientation: 'p' }
    };
       html2pdf().from(invoice).set(opt).save();
    
      })
    }
            
        </script>

</body>

</html>
