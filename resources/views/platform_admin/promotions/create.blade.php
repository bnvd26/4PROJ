
            @extends('layouts.app')

            @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Create</h1>
            <form action="{{ route('promotions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="year" class="text-black">Année</label>
                        <input class="form-control text-black" id="year" name="year">
                    </div>
                    <select name="degree" id="degree" class="form-select" onchange="this.form.submit()">
                        <option value="" selected disabled hidden></option>
                        @foreach (config('app.degrees') as $key => $item)
                        <option value="{{ $key }}" {{ app('request')->input('degree') == $key ? 'selected' :
                            '' }}>
                            {{ $item }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- /.row-->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
                </div>
            </div>
            @endsection

