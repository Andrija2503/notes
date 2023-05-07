@extends('layout') 
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Notes Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Note.create') }}">
                    Add New Note
                </a>
            </div>
        </div>
    </div> 
 
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif 
 
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Note</th>
            <th>Status</th>
            <th style="width:280px">Action</th>
        </tr> 
 
        @foreach($Note as $note)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $note->title}}
                @if ($note->status == 'deleted')
                    <td><del>{{ $note->text }}</del></td>
                    <td>Deleted</td>
                @else
                    <td>{{ $note->text }}</td>
                    <td>Active
                @endif               
 
                <td>
                    <form action="{{ route('Note.destroy', $note->id) }}" method="POST">
                        <a class="btn btn-info"
                            href="{{ route('Note.show', $note->id) }}">
                            Show
                        </a> 
 
                        <a class="btn btn-primary"
                            href="{{ route('Note.edit', $note->id) }}">
                            Edit
                        </a> 
 
                        {{-- @csrf
                        @method('DELETE')
                        --}} 
 
                        {{ csrf_field() }}
                       {{ method_field('DELETE') }}
  
 
                        <button type="submit" class="btn btn-danger">
                            Edit Status
                        </button> 
 
                    </form>
                </td>
            </tr>
        @endforeach
    </table> 
 
    {!! $Note->links() !!} 
 
@endsection