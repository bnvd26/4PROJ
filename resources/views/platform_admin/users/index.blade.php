@extends('layouts.app')

@section('content')
<style>
svg {
    width: 30px;
}

</style>
    <!-- #listDelete -->
    <div class="modal fade" id="listDelete" tabindex="-1" role="dialog" aria-labelledby="listDeleteLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer cet utilisateur ?</p>
                    <form method="POST" id="listDeletion">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="row">

                            <input type="hidden" class="form-control text-black" id="emailValue" name="email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-outline-danger"
                        onclick="$('#listDeletion').submit();">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /#listDelete -->
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Utilisateurs</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Campus</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                            </tr>
                        </thead>
                        @php
                            use App\Models\Student;
                        @endphp
                        <tbody>
                            @foreach ($users as $user)
                                <tr onclick="window.location='{{ route('users.show', ['user' => $user->id]) }}';">
                                    <td>{{ $user->type == 'student' && !is_null(Student::where('id', $user->id)->first()) ? Student::where('id', $user->id)->first()->campus->location : '' }}
                                    </td>
                                    <th scope="row">{{ $user->email }}</th>
                                    <td>
                                        <span
                                            class="badge {{ $user->type_badge_class_name }}">{{ config('app.user_types.' . $user->type) }}</span>
                                    </td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="text-red" data-toggle="modal"
                                            id="listDeleteId-{{ $user->id }}" data-target="#listDelete"
                                            data-user-id="{{ route('users.destroy', ['user' => $user->id]) }}">

                                            <img src="{{ asset('images/delete.png') }}" alt="" width="25px">

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var users = {!! json_encode($users) !!};

        for (let index = 0; index < users.length; index++) {
            $('#listDeleteId-' + users[index]['id']).click(function(event) {
                document.querySelector('#listDeletion').setAttribute('action', $(this).data('user-id'))
            })
        }
    </script>
@endsection
