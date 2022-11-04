@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Frais de l'élève <strong> {{$student->nom}}</strong> </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <a href="" class="btn btn-primary ">
                            <i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">Nom et Prénom</th>
                                <th class="text-center">Quartier</th>
                                <th class="text-center">Tel du parent</th>
                                <th class="text-center">Classe</th>
                                <th class="text-center">Frais de cours</th>
                                <th class="text-center">Opération</th>


                            </tr>
                            </thead>

                            <tbody>

                            @foreach($students as $student)
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>

                                    <td class="text-center">
                                        <a class="btn btn-space btn-info btn-xs voir" href=""><i
                                                class="fa fa-1x fa-money sr-icons"></i></a>

                                    </td>
                                    <td class="text-center">

                                        <a target="_blank" class=" btn btn-space btn-primary btn-xs sr-icons "
                                           style="color:white;" href=""><i
                                                class="fa fa-1x fa-pencil sr-icons"></i> </a>

                                        <form action="" method="post"
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
    <!-- create -->


@endsection


@section('script')

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>


@endsection
