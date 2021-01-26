@extends('layouts.app')

@section('title')
    About | emurmu
@endsection

@section('main-content')
    <h1 class="mt-4">About</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a> </li>
        <li class="breadcrumb-item active"><a href="{{route('about.manage')}}">About</a> </li>
        <li class="breadcrumb-item active">Add about info </li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add about info</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('about.create')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="about_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="about_description" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About image</label>
                            <div class="col-sm-9">
                                <input type="file" onchange="readURL(this)" name="about_image" accept="image/*" class="form-control-file">
                                <img src="#" id="image" class="mt-3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1">
                                    <label class="form-check-label">
                                        Published
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label">
                                        Unpublished
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-sm-9 ml-auto">
                                <button type="submit" class="btn btn-block btn-info">Add about info</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result).width(120).height(90);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
