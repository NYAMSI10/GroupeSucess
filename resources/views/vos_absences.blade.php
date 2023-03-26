@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Vos Absences </h5>
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
                                <th class="text-center">Date</th>
                                <th class="text-center">Nom de la classe </th>
                                <th class="text-center">Heure du cours</th>
                                <th class="text-center">Période du cours</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($presences as $presence)
                                <tr>
                                    <td class="text-center"> {{$presence->created_at->format('d-m-Y \à H:i')}}  </td>
                                    <td class="text-center"> {{nomclas($presence->classe_id)}} </td>
                                    <td class="text-center"> {{$presence->start}} à {{$presence->end}}  </td>
                                    <td class="text-center"> {{nomperiode($presence->periode_id)}}  </td>

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
    <div class="modal inmodal" id="create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <form action="{{route('matiere.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label" for="value">Nom de la matiere</label>
                                    <input type="text" id="nom" class="form-control" name="nom"
                                           value="{{ old('nom') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                        <button type="button" class="btn btn-white" data-dismiss="modal"><i
                                class="fa fa-times"></i></button>
                    </div>
                </form>
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
