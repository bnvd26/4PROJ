@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nom</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr onclick="window.location='{{ route('academic_subjects.show', ['academic_subject' => $subject->id]) }}';" style="cursor:pointer" class="tr-hover">
                        <th scope="row">{{ $subject->name }}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

