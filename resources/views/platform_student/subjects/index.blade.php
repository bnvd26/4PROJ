@extends('layouts.app')

@section('content')
<body style="background-color:#adb5bd">
<div class="container">
    <div class="row justify-content-center">
        <h1>Mes matières</h1>
        @foreach ($subjects as $subject)
          <div class="card" style="width: 18rem;margin: 10px">
            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $subject->name }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('subjects.show', ['subject' => $subject->id]) }}" class="btn btn-primary">Go</a>
            </div>
          </div>
        @endforeach
    </div>
</div>
</body>
@endsection



