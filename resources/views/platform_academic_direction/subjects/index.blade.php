@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="container">





    <div class="row justify-content-center">
        <h1>Matières</h1>
        <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search"></input>
        </div>
        <div class="row content">
        @foreach ($subjects as $subject)
          <div class="card" style="width: 18rem;margin: 10px">
            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $subject->name }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('academic_subjects.show', ['academic_subject' => $subject->id]) }}" class="btn btn-primary">Go</a>
            </div>
          </div>
        @endforeach
        </div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '{{URL::to('search_subjects')}}',
            data:{'search':$value},
            success:function(data){
            $('.content').html(data);
            }
            });
            })
            </script>
            <script type="text/javascript">
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            </script>
    </div>
</div>
@endsection





