@php($editing = isset($faq))
@extends('admin.layout', ['title' => $editing ? 'Edit FAQ' : 'Add FAQ', 'heading' => $editing ? 'Edit FAQ' : 'Add FAQ'])

@section('content')
    <form action="{{ $editing ? route('faqs.update', $faq) : route('faqs.store') }}" method="POST">
        @csrf
        @if($editing) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label" for="question">Question</label>
            <input class="form-control" id="question" name="question" value="{{ old('question', $faq->question ?? '') }}" maxlength="255" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="6" maxlength="5000" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label" for="sort_order">Display order</label>
            <input class="form-control" type="number" id="sort_order" name="sort_order" min="0" max="9999" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" required>
        </div>

        <button class="btn btn-primary" type="submit">{{ $editing ? 'Save FAQ' : 'Add FAQ' }}</button>
        <a class="btn btn-light" href="{{ route('faqs.index') }}">Cancel</a>
    </form>
@endsection
