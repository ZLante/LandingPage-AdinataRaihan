@extends('admin.layout', ['title' => 'Email', 'heading' => 'Email'])

@section('content')
    <p class="text-muted">Review contact messages and email enquiries from the POLNEP website.</p>
    @if($contacts->isEmpty())
        <div class="alert alert-info mb-0">No contact messages have been received yet.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Sender</th><th>Email</th><th>Phone</th><th>Message</th><th>Received</th></tr></thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            <td>{{ $contact->phone ?: '-' }}</td>
                            <td>{{ Str::limit($contact->message, 100) }}</td>
                            <td>{{ $contact->created_at?->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $contacts->links() }}
    @endif
@endsection
