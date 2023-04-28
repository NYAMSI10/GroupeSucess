@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste de vos Epreuves  </h5>
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
                                <th class="text-center">Nom du fichier </th>
                                <th class="text-center">Opération</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sujet as $sujets)
                                <tr>
                                    <td class="text-center">{{$sujets->created_at->format('d-m-Y \à H:i') }}</td>
                                    <td class="text-center">{{$sujets->file}}</td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-space btn-info btn-xs voir" ><i class="fa fa-1x fa-eye sr-icons"></i></a> -->



                                        <form action="{{ route('sujet.deletesujet', $sujets->id)}}" method="GET"
                                              style="display: inline-block" onclick="return confirm('Voulez-vous vraiment supprimer cette epreuve?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger btn btn-xs"><i
                                                    class="fa fa-1x fa-trash sr-icons"></i></button>
                                        </form>


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
    <div class="modal inmodal" id="create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <form action="{{route('classe.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label" for="value">Nom de la classe</label>
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

    <!-- update -->
    <div class="modal inmodal" id="update" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <form action="/classe" method="POST" id="viewform">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label" for="value">Nom de la classe</label>
                                    <input type="text" name="nom" id="nom" class="form-control"
                                    >
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


