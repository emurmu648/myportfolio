@extends('layouts.app')


@section('title')
    View Contact | emurmu
@endsection

@section('main-content')

    <h1 class="mt-4 ml-2">Contact</h1>
    <ol class="breadcrumb mb-4 ml-2 bg-info mr-2">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('contact.view')}}">Contact</a></li>
        <li class="breadcrumb-item active">Manage Contact Info</li>
    </ol>
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h4>View Contact Info</h4>
                </div>
                <div class="card-body bg-secondary">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Client Phone</th>
                            <th>Client Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $key=> $contact)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{Str::limit($contact->message,50)}}</td>
                                <td>
                                    <a href="{{route('contact.details',['id'=>$contact->id])}}" class="btn btn-sm btn-info mb-1"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteContact({{$contact->id}});"><i class="fa fa-trash"></i></a>
                                    <form id="delete-contact-{{$contact->id}}" action="{{route('contact.delete',['id'=>$contact->id])}}" method="POST" style="display: none;">
                                    @csrf

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{$contacts->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteContact(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#27ae60',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-contact-'+id).submit();
                }
            })
        }
    </script>


@endsection
