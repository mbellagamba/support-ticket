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
        <td>
            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
        </td>
        <td>
            <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}"
                  method="POST">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger">Close</button>
            </form>
        </td>
    </tr>
@endforeach
