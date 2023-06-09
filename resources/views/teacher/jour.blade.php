@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des Enseignants du Jour </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <a href="{{route('user.create')}}" class="btn btn-primary ">
                            <i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Nom et Prénom</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Quartier</th>
                                <th class="text-center">Tel</th>
                                <th class="text-center">Salaire</th>
                                <th class="text-center">Opération</th>


                            </tr>
                            </thead>

                            <tbody>

                            @foreach($periode as $tea)
                                <tr>
                                    <td class="text-center">{{$tea->nom }}</td>
                                    <td class="text-center">{{$tea->email}}</td>
                                    <td class="text-center">{{$tea->quartier}}</td>
                                    <td class="text-center">{{$tea->tel}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-space btn-info btn-xs voir"
                                           href="{{ route('salaires.salaire', $tea->id)}}"><i
                                                class="fa fa-1x fa-money sr-icons"></i></a>
                                    </td>
                                    <td class="text-center">

                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href="{{ route('user.edit', $tea->id)}}"><i
                                                class="fa fa-1x fa-pencil sr-icons"></i> </a>

                                        <form action="{{ route('user.destroy', $tea->id)}}" method="post"
                                              style="display: inline-block">
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
