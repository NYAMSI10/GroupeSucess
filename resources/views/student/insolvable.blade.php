@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des Elèves Insovables </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                 
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Nom et Prénom</th>
                                <th class="text-center">Classe</th>
                                <th class="text-center">Période</th>
                                <th class="text-center">Mois de Paiement </th>
                                <th class="text-center">Reste à payer </th>
                             


                            </tr>
                            </thead>

                            <tbody>

                            @foreach($insol as $insole)
                                <tr>
                                    <td class="text-center">{{student($insole->student_id)->nom}}</td>
                                    <td class="text-center">{{nomclas(student($insole->student_id)->classe_id)}}</td>
                                    <td class="text-center">{{nomperiode(student($insole->student_id)->periode_id)}}</td>
                                    <td class="text-center">{{$insole->mois}}</td>
                                    <td class="text-center" style="color: red;">{{$insole->reste}} FCFA</td>


                                   
                               


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
