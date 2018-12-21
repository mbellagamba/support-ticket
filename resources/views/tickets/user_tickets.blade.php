@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-ticket"> My Tickets</i>
                </div>

                <div class="card-body">
                    @if ($tickets->isEmpty())
                        <p>You have not created any tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $ticket->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($ticket->status === 'Open')
                                        <span class="badge badge-success">{{ $ticket->status }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $ticket->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
