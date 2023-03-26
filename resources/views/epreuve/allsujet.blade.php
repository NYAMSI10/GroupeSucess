@extends('Home.layout')


@section('links')


@endsection



@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>File Manager</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    App Views
                </li>
                <li class="active">
                    <strong>File Manager</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">

                            <div class="hr-line-dashed"></div>
                            <div class="hr-line-dashed"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list" style="padding: 0">
                                @foreach(user() as $user)
                                <li><a href=""><i class="fa fa-folder"></i> {{$user->nom}}</a></li>
                                @endforeach
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">

                        @foreach(allsujet() as $sujet)
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="file-name">
                                      {{$sujet->file}}
                                        <br/>
                                        <small>Send : {{$sujet->created_at->format('D-M-Y')}}</small>
                                        <br>
                                        <small>By : {{nomuser($sujet->user_id)->nom}}</small>
                                        <a href="#" style="margin-left: 57%; color:red" class="remove_image"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </a>
                            </div>

                        </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
@endsection
