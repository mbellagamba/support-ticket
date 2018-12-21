@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="card-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>Categry: {{ $category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Open')
                                Status: <span class="badge badge-success">{{ $ticket->status }}</span>
                            @else
                                Status: <span class="badge badge-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach ($comments as $comment)
                            <div class="card card-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                                <div class="card card-header">
                                    {{ $comment->user->name }}
                                    <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                </div>

                                <div class="card card-body">
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection