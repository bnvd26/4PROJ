@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="row justify-content-center flex-column">
                        <h1>Créer un campus</h1>
                        <form action="{{ route('campuses.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control text-black" id="location" name="location" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control text-black" id="street_address" name="street_address" placeholder="Addresse">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control text-black" id="zipcode" name="zipcode" placeholder="Code postal">
                                    </div>
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
