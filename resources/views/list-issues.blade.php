@extends('layout.main')
@section('content')

<button type="button" class="btn btn-dark" style="margin-bottom: 1em">
        <a href="{{ route('show-create-issues') }}">Add issue</a></button>
<table class="table table-bordered" >
        <thead>
            <tr>
                <th>
                    
                </th>
                <th>Name</th>
                <th>Date</th>
                <th>Link download</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($issues as $is)
                <tr>
                    <td>
                        
                    </td>
                    <td>{{ $is['created_at']->toFormattedDateString()}} issue</td>
                    <td>{{ $is['created_at'] }}</td>
               
  
                <td><a href="{{route('download-issue',$is['date'].'.pdf')}}">Link Download</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $issues->links() }}
    </div>
@endsection
