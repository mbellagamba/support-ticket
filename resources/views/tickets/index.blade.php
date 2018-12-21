@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">
                    <i class="fa fa-ticket"> Tickets</i>
                </div>

                <div class="form-group">
                    <input placeholder="Search..." type="text" class="form-controller" id="search" name="search"/>
                </div>

                <div class="card-body">
                    @if ($tickets->isEmpty())
                        <p>There are currently no tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @include('injections.admin_tickets', compact('categories', 'tickets'))
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#search').on('keyup', function () {
                let query = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{url('search')}}',
                    data: {'q': query},
                    success: function (data) {
                        $('tbody').append(data);
                    }
                });
            })
        });
    </script>

    <script type="text/javascript">

        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});

    </script>
@endsection