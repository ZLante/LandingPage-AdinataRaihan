@extends('admin.layout', ['title' => 'Partnerships', 'heading' => 'Collaboration Management'])

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('partners.create') }}" class="btn btn-primary">Add Collaboration</a>
    </div>

    @if($partners->isEmpty())
        <div class="alert alert-info mb-0">No collaborations have been added yet.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Website</th>
                        <th>Order</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $partner)
                        <tr>
                            <td>
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="" width="48" height="48" class="rounded object-fit-contain">
                                @else
                                    <span class="d-inline-flex align-items-center justify-content-center rounded bg-light text-primary" style="width: 48px; height: 48px;"><i class="{{ $partner->icon }} fs-4"></i></span>
                                @endif
                            </td>
                            <td><strong>{{ $partner->name }}</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit($partner->description, 90) }}</td>
                            <td>
                                @if($partner->website)
                                    <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer">Open</a>
                                @else
                                    <span class="text-muted">None</span>
                                @endif
                            </td>
                            <td>{{ $partner->sort_order }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('partners.edit', $partner) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this collaboration?')">
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
        {{ $partners->links() }}
    @endif
@endsection
