
            @extends('layouts.app')

            @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Create</h1>
<form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="last_name" class="text-black">Nom</label>
                        <input class="form-control text-black" id="last_name" name="last_name">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="first_name" class="text-black">Prénom</label>
                        <input class="form-control text-black" id="first_name" name="first_name">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="user_type" class="text-black">Type</label>
                        <select class="form-control text-black" id="user_type" name="user_type">
                            @foreach (config('app.user_types') as $key => $type)
                            <option value="{{ $key }}" >{{ $type }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="text-black">Email</label>
                        <input class="form-control text-black" id="email" name="email" type="email">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name" class="text-black">Mot de passe</label>
                        <input class="form-control text-black" id="name" name="name" type="password">
                    </div>
                </div>
                <!-- /.row-->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
                </div>
            </div>
            @endsection

