@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Frais de cours de l'élève <strong> {{$student->nom}}</strong> </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <a href="{{route('students.paie', $student->id)}}" class="btn btn-primary ">
                            <i class="fa fa-plus"></i> Ajouter un paiement</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Date de paiement</th>
                                <th class="text-center">Mois</th>
                                <th class="text-center">Montant</th>
                                <th class="text-center">Avance</th>
                                <th class="text-center">Reste à payer</th>
                                <th class="text-center">Classe</th>
                                <th class="text-center">Opération</th>


                            </tr>
                            </thead>

                            <tbody>

                        @foreach($students as $stud)
                                <tr>
                                    <td class="text-center">{{$stud->created_at->format('d-m-Y \à H:i') }}</td>
                                    <td class="text-center"> {{$stud->mois}}</td>
                                    <td class="text-center"><strong>{{$stud->frais}} CFA</strong></td>
                                    <td class="text-center"><strong>{{$stud->avance}} CFA</strong></td>
                                    <td class="text-center">
                                     @if($stud->reste != 0)
                                        <strong style="color: red">{{$stud->reste}} CFA</strong>
                                     @else
                                         <strong class=" btn btn-space btn-primary btn-xs sr-icons "><i
                                                 class="fa fa-1x fa-check sr-icons"></i></strong>
                                        @endif
                                    </td>
                                    <td class="text-center">{{$classe->nom}} </td>


                                    <td class="text-center">
                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href=" {{ route('students.showfrais',$stud->id)}}"><i
                                                class="fa fa-1x fa-eye sr-icons"></i> </a>
                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href=" {{ route('students.showfrais',$stud->id)}}"><i
                                                class="fa fa-1x fa-pencil sr-icons"></i> </a>





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
