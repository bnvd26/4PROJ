@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>


        <div class="row">
            <div class="panel panel-default">
            <div class="panel-heading">
            <h3>Products info </h3>
            </div>
            <div class="panel-body">
            <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search"></input>
            </div>
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>Campus</th>
            <th>Promotion</th>
            <th>Nom</th>
            <th>Prénom</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr onclick="window.location='{{ route('academic_students.show', ['academic_student' => $student->id]) }}';" style="cursor:pointer" class="tr-hover">

                    <td>{{ $student->campus->location }}</td>
                    <td>{{ $student->promotion->year }}</td>
                    <td>{{ $student->user->first_name }}</td>
                    <td>{{ $student->user->last_name }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
            </div>
            </div>
            </div>
            <script type="text/javascript">
            $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '{{URL::to('search_students')}}',
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
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

