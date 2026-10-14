@extends('admin.layout', ['title' => 'FAQs', 'heading' => 'Frequently Asked Questions'])

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('faqs.create') }}" class="btn btn-primary">Add FAQ</a>
    </div>

    @if($faqs->isEmpty())
        <div class="alert alert-info mb-0">No FAQs have been added yet.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr><th>Question</th><th>Answer</th><th>Order</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td><strong>{{ $faq->question }}</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit($faq->answer, 120) }}</td>
                            <td>{{ $faq->sort_order }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $faqs->links() }}
    @endif
@endsection
