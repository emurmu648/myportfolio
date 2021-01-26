@extends('layouts.app')


@section('title')
    View Contact | emurmu
@endsection

@section('main-content')

    <h1 class="mt-4 ml-2">Contact</h1>
    <ol class="breadcrumb mb-4 ml-2 bg-info mr-2">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('contact.view')}}">Contact</a></li>
        <li class="breadcrumb-item active">View Contact Details</li>
    </ol>
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h4>View Contact Details</h4>
                </div>
                <div class="card-body bg-secondary">
                    <table class="table table-bordered">
                        <tr>
                            <th>Client Name</th>
                            <td>{{$contact->name}}</td>
                        </tr>

                        <tr>
                            <th>Client Email</th>
                            <td>{{$contact->email}}</td>
                        </tr>

                        <tr>
                            <th>Client Phone</th>
                            <td>{{$contact->phone}}</td>
                        </tr>

                        <tr>
                            <th>Client Message</th>
                            <td><textarea cols="80" rows="08">{{$contact->name}}</textarea></td>
                        </tr>

                        <tr>
                            <th>Reply CLient</th>
                            <td><button><a href = "mailto:{{$contact->email}}">Click here to reply client</a></button></td>

                        </tr>

                    </table>
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
