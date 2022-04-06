
            @extends('layouts.app')

            @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Create</h1>
            <form action="{{ route('campuses.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="location" class="text-black">Location</label>
                        <input class="form-control text-black" id="location" name="location">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="address" class="text-black">Adresse</label>
                        <input class="form-control text-black" id="address" name="address">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="zipcode" class="text-black">Code postal</label>
                        <input class="form-control text-black" id="zipcode" name="zipcode">
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

