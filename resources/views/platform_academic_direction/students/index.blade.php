@extends('layouts.app')

@section('content')
    <style>
        svg {
            width: 30px;
        }
    </style>
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <h1>Nos Etudiants</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Campus</th>
                            <th scope="col">Promotion</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($students as $student)
                            <tr onclick="window.location='{{ route('students.show', ['student' => $student->id]) }}';"
                                style="cursor:pointer" class="tr-hover">
                                <th scope="row">{{ $student->campus->location }}</th>
                                <th scope="row">{{ $student->promotion->year }}</th>
                                <th scope="row">{{ $student->user->first_name }}</th>
                                <th scope="row">{{ $student->user->last_name }}</th>
                                </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
