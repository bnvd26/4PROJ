@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    @if (Auth::user()->type == 'student')
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Sujets</h3>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student->subjects as $subject)
                        <tr onclick="window.location='{{ route('subjects.show', ['subject' => $subject->id]) }}';"
                            style="cursor:pointer" class="tr-hover">
                            <td>{{ $subject->name }}</td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    @endif



    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
