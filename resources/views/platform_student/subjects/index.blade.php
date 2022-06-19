@extends('layouts.app')

@section('content')
<div class="header pb-8 pt-5 pt-md-8">
    <div class="container-fluid">

        <div class="col-xl-12 mb-5 mb-xl-0">

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
                        @foreach ($subjects as $subject)
                            <tr onclick="window.location='{{ route('subjects.show', ['subject' => $subject->id]) }}';"
                                style="cursor:pointer" class="tr-hover">
                                <td>{{ $subject->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>

                {!! $subjects->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection



