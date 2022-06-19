@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <p>Nom : {{ $user->last_name }}</p>
                    <p>Prénom : {{ $user->first_name }}</p>

                </div>
            </div>
        </div>
    </div>
@endsection
