@extends('Home.layout')


@section('links')

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection




@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des élèves de {{$classe->nom}} </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="text-center">
                        <i class="fa fa-info" style="color: red;"></i>
                        <span class="text-small">Veuillez Cocher uniquement les élèves Absents</span>
                    </div>
                    <br>
                    <form method="post" action="{{route('discipline.store')}}">

                        @csrf
                        <input type="hidden" class="input-sm form-control" name="periode" value="{{$periode->id}}">
                        <input type="hidden" class="input-sm form-control" name="classe" value="{{$classe->id}}">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Selectionnez Votre Matiere</label>

                                    <select class="select2 form-control" name="matiere" required>

                                        <option value="">Selectionnez votre matiére</option>


                                        @foreach(matieres() as $mat)

                                            <option value="{{ $mat->id }}">{{$mat->nom}}</option>

                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Mettre l'Horraire de votre cours </label>

                                    <div class="input-daterange input-group" id="datepicker">

                                        <input type="time" class="input-sm form-control" name="start"
                                               required/>
                                        <span class="input-group-addon">à</span>
                                        <input type="time" class="input-sm form-control" name="end"
                                               required/>
                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="table-responsive">
                            <br>
                            <table class="table table-striped table-bordered table-hover " id="datatable">
                                <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Discipline</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="text-center"> {{$student->nom}}</td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" name="absent[]"
                                                   value="{{$student->id}}">

                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group" style="margin-right: 47%;">
                            <button class="btn btn-md btn-primary pull-right" type="submit">Valider</button>
                        </div>

                    </form>
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
