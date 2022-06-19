@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Professeurs</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('professors.create') }}" class="btn btn-sm btn-primary">Ajouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Matière</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professors as $professor)
                                    <tr>
                                        <th scope="row">
                                            {{ $professor->subject->name }}
                                        </th>
                                        <td>
                                            {{ $professor->last_name }}
                                        </td>
                                        <td>
                                            {{ $professor->first_name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
