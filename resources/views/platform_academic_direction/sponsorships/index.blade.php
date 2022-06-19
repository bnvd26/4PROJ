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
                <h1>Nos Partenaires</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sponsorships as $sponsorship)
                            <tr onclick="window.location='{{ route('sponsorships.show', ['sponsorship' => $sponsorship->id]) }}';"
                                style="cursor:pointer" class="tr-hover">
                                <th scope="row">{{ $sponsorship->name }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection
