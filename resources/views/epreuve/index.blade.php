@extends('Home.layout')


@section('links')

    <link href="{{asset('css/plugins/dropzone/basic.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
@endsection




@section('content')

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sujets</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="POST" action="{{route('epreuve.store')}}" id="dropzoneForm" class="dropzone"  enctype="multipart/form-data">
                            @csrf
                            <div class="dropzone-previews"> </div>
                        </form>
                            <button type="submit" class="btn btn-primary pull-right" style="margin-right: 50%" id="submit-all">Envoyé</button>
                        <br>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <!-- DROPZONE -->
    <script src="{{asset('js/plugins/dropzone/dropzone.js')}}"></script>

    <script type="text/javascript">

        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            acceptedFiles : ".png,.jpg,.gif,.jpeg,.pdf",
            addRemoveLinks: true,


            init:function(){
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this;

                submitButton.addEventListener('click', function(){
                    myDropzone.processQueue();
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                });

            }

        };





    </script>
@endsection
