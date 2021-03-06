@extends('layouts.app')

@section('content')
    @foreach ($gradebooks as $gradebook)
        <div class="header pb-8 pt-5 pt-md-8">
            <div class="container-fluid">

                <div class="col-xl-12 mb-5 mb-xl-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sujet</th>
                                <th scope="col">Passé</th>
                                <th scope="col">Note</th>
                                <th scope="col">Activé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gradebook->results as $result)
                                <tr>
                                    <td>{{ $result->subject->name }}</td>
                                    <th scope="row">
                                        {{ $result->passed ? 'Oui' : 'Non' }}
                                    </th>
                                    <th scope="row">{{ $result->passed ? $result->result . ' %' : '' }} </th>
                                    <th scope="row">{{ $result->exam->activated ? 'Oui' : 'Non' }} </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection
