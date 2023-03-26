@extends('Home.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form action="{{route('presence.update', $presence->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5" style="margin-left: 30%">
                                <div class="form-group">
                                    <label class="form-label"> l'Horraire du cours </label>

                                    <div class="input-daterange input-group" id="datepicker">

                                        <input type="text" class="input-sm form-control" name="start"
                                               value="{{$presence->start}}"
                                               required/>
                                        <span class="input-group-addon">à</span>
                                        <input type="time" class="input-sm form-control" name="end"
                                               value="{{$presence->end}}"

                                               required/>
                                    </div>


                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="form-group" style="margin-right: 47%;">
                            <button class="btn btn-md btn-primary pull-right" type="submit">Modifier</button>
                        </div>


                    </form>


                </div>


            </div>


        </div>
    </div>
    </div>
    </div>
@endsection
