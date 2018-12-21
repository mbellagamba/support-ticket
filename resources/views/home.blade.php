@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!</p>
                        @if (Auth::user()->is_admin)
                            <p>
                                See all <a href="{{ url('admin/tickets') }}">tickets</a>
                            </p>
                        @else
                            <p>
                                See all your <a href="{{ url('my_tickets') }}">tickets</a> or <a
                                        href="{{ url('new_ticket') }}">open new ticket</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
