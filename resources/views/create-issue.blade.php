@extends('layout.main')
@section('content')
<h1>Create Issue</h1>
<form action="{{route('create-issues')}}" method="post" >

    {{ @csrf_field() }}


    
    <label for="">Content issue:</label> <br>
    <textarea name="content" class="form-control"></textarea> <br>
    <!-- <label for="">Creared Date:</label>  -->
    <!-- <input type="hidden" name="date" value="now()"> <br> -->
    @if ($errors->has('issue'))
    <p style="color:red">{{ $errors->first('issue') }}</p>
    @endif



    <input type="submit" id="createBtn" value="Public Issue" class="btn btn-primary">
</form>
@endsection