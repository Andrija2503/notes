@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Note</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                    href="{{ route('Note.index')}}">
                    Back
                </a>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $Note->title }}
            </div>
            <div class="form-group">
                <strong>Note:</strong>
                @if ($Note->status === 'active')
                    {{ $Note->text }}
                @else
                    <del> {{ $Note->text }} </del>
                @endif
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                @if ($Note->status === 'active')
                    Active
                @else
                    Deleted
                @endif
            </div>
        </div>
    </div>
@endsection