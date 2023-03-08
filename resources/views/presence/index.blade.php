@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste de présence des enseignants </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Classe</th>
                                <th class="text-center">Période de cours</th>
                                <th class="text-center">Horaire de Cours</th>
                                <th class="text-center">Acceptation</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($presences as $presence)
                                <tr>
                                    <td class="text-center"> {{$presence->created_at->format('d-m-Y \à H:i')}}  </td>
                                    <td class="text-center"> {{nomuser($presence->user_id)->nom}}  </td>
                                    <td class="text-center"> {{$presence->start}} à {{$presence->end}}  </td>
                                    <td class="text-center"> {{nomclas($presence->classe_id)}}  </td>
                                    <td>{{nommat($presence->matiere_id)->nom}}</td>

                                    <td class="text-center">
                                        <!-- <a class="btn btn-space btn-info btn-xs voir" ><i class="fa fa-1x fa-eye sr-icons"></i></a> -->
                                        @if($presence->accept == 0)

                                            <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                               style="color:white;" href="{{route('presences.accept', $presence->id)}}" ><i class="fa fa-check"></i> </a>
                                            <a target="_blank" class=" btn btn-space btn-danger btn-xs sr-icons "
                                               style="color:white;" href="{{route('presences.noaccept', $presence->id)}}" disabled><i class="fa fa-times"></i> </a>
                                            @else
                                            <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                               style="color:white;" href="{{route('presences.accept', $presence->id)}}" disabled><i class="fa fa-check"></i> </a>
                                            <a target="_blank" class=" btn btn-space btn-danger btn-xs sr-icons "
                                               style="color:white;" href="{{route('presences.noaccept', $presence->id)}}" ><i class="fa fa-times"></i> </a>
                                        @endif

                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href=""><i class="fa fa-1x fa-pencil sr-icons"></i> </a>


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


