@extends('layouts.app')


@section('title')
    Manage About | emurmu
@endsection()

@section('main-content')
    <h1 class="mt-4">About</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a> </li>
        <li class="breadcrumb-item active"><a href="{{route('about.manage')}}">About</a> </li>
        <li class="breadcrumb-item active">Manage about info </li>
    </ol>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Manage about info</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>About Name</th>
                            <th>About Image</th>
                            <th>About Description</th>
                            <th>About Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abouts as $key=>$about)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$about->about_name}}</td>
                                <td>
                                    <img src="{{asset($about->about_image)}}" alt="{{$about->about_name}}" height="100" width="100">
                                </td>
                                <td>{{Str::limit($about->about_description, 30)}}</td>
                                <td>
                                    @if($about->status==1)
                                        <span class="badge badge-success">
                                            <strong>Published</strong>
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                        <strong>Unpublished</strong>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('about.edit',['id'=>$about->id])}}" class="btn btn-sm btn-info mb-1"><i class="fa fa-edit"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteAbout({{$about->id}});"><i class="fa fa-trash"></i> </a>
                                    <form id="delete-about-{{$about->id}}" action="{{route('about.delete',['id'=>$about->id])}}" method="post" style="display: none;">
                                        @csrf

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{$abouts->links()}}
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteAbout(id) {
            Swal.fire({
                title:'Are you sure?',
                text: "This will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#27ae60',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result)=>{
                if(result.value){
                    event.preventDefault();
                    document.getElementById('delete-about-'+id).submit();
                }
            })
        }

    </script>

@endsection
