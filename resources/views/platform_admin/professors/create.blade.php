@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="row justify-content-center">
                        <h1>Créer un utilisateur</h1>
                        <form action="{{ route('professors.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control text-black" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="first_name" class="text-black">Prénom</label>
                                    <input class="form-control text-black" id="first_name" name="first_name">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="company_name" class="text-black">Société</label>
                                    <input class="form-control text-black" id="company_name" name="company_name">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="text-black">Email</label>
                                    <input class="form-control text-black" id="email" name="email">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="phone_number" class="text-black">Téléphone</label>
                                    <input class="form-control text-black" id="phone_number" name="phone_number">
                                </div>
                                <div class="form-group col-sm-6">
                                    Sujet
                                    <select class="form-select text-black" id="subject" name="subject">
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.row-->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
