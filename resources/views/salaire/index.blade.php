@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Salaire de l'enseignant <strong> {{$user->nom}}</strong> </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <a href="{{route('salaires.paie', $user->id)}}" class="btn btn-primary ">
                            <i class="fa fa-plus"></i> Paiement du salaire</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Date de paiement</th>
                                <th class="text-center">Mois du payement</th>
                                <th class="text-center">Nombre de scéance ou d'Heure éffectuée</th>
                                <th class="text-center">Montant par scéance ou par heure </th>
                                <th class="text-center">Montant du salaire</th>
                                <th class="text-center">Période de cours </th>
                                <th class="text-center">Opération</th>


                            </tr>
                            </thead>

                            <tbody>

                             @foreach($salaires as $salaire)



                                <tr>
                                    <td class="text-center"> {{$salaire->created_at->format('d-m-Y \à H:i') }}</td>
                                    <td class="text-center">{{$salaire->mois}} </td>

                                    <td class="text-center">
                                        {{$salaire->nbrework}}
                                    </td>
                                    <td class="text-center">
                                        {{$salaire->mtfrais}} CFA
                                    </td>
                                    <td class="text-center">
                                       <strong>   {{$salaire->montantsalaire}} CFA</strong>
                                    </td>
                                    <td class="text-center"> {{nomperiode($salaire->periode)}}</td>


                                    <td class="text-center">

                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href=" {{route("salaire.edit", $salaire->id)}}"><i
                                                class="fa fa-1x fa-pencil sr-icons"></i> </a>

                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           onclick="return confirm('Voulez-vous vraiment supprimer ce salaire?')" href=" " ><i
                                                class="fa fa-1x fa-trash sr-icons"></i> </a>



                                    </td>


                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- create -->


@endsection


@section('script')

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {

            // update modal

            var table = $('#datatable').DataTable();

            table.on('click', '.voir', function () {


                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);


                $('#nom').val(data);


                $('#viewform').attr('action', '/classe/' + data);
                $('#update').modal('show');


            });
        });

    </script>
@endsection
