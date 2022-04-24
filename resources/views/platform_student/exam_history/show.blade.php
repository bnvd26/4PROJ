@extends('layouts.app')

@section('content')
@foreach ($exam_historic as $history)
<p>Question : {{ $history->question->question }}</p>

<ul>
@foreach ($history->question->answers as $answer)
<Li>{{ $answer->answer }} - {{ $answer->truth ? 'Bon' : 'Pas bon' }}</li>
@endforeach
</ul>

<p>Réponse selectionée : {{ $history->answer->answer }}
<strong>REPONSE : {{ $history->answer->truth ? 'Bon' : 'Pas bon' }} </strong>
@endforeach


<p> Résultat : {{ $gradebook_result->result }} % - {{ $gradebook_result->passed ? 'Admis' : 'Non admis' }} </p>


@endsection
