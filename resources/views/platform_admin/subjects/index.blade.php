@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($subjects as $subject)
            <tr onclick="window.location='{{ route('academic_subjects.show', ['academic_subject' => $subject->id]) }}';" style="cursor:pointer" class="tr-hover">
                <td>{{ $subject->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
