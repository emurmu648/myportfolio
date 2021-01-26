@extends('layouts.app')


@section('title')
    Manage Services | emurmu
@endsection

@section('main-content')

    <h1 class="mt-4 ml-2">Manage Services</h1>
    <ol class="breadcrumb mb-4 ml-2 bg-info mr-2">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('services.manage')}}">Manage Services</a></li>
        <li class="breadcrumb-item active">Manage Services Info</li>
    </ol>
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h4>Manage Services Info</h4>
                </div>
                <div class="card-body bg-secondary">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Services Name</th>
                            <th>Services Image</th>
                            <th>Services Description</th>
                            <th>Services Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servicesinfo as $key=> $services)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$services->services_name}}</td>
                                <td>
                                    <img src="{{asset($services->services_image)}}" alt="{{$services->services_name}}" height="100" width="100">
                                </td>
                                <td>{{Str::limit($services->services_description, 30)}}</td>
                                <td>
                                    @if($services->status==1)
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
                                    <a href="{{route('services.edit',['id'=>$services->id])}}" class="btn btn-sm btn-info mb-1"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteServices({{$services->id}});"><i class="fa fa-trash"></i></a>
                                    <form id="delete-services-{{$services->id}}" action="{{route('services.delete',['id'=>$services->id])}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{$servicesinfo->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteServices(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will be delete permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#27ae60',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-services-'+id).submit();
                }
            })
        }
    </script>


@endsection
