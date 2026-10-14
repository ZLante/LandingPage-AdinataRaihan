@extends('admin.layout', ['title' => 'Help', 'heading' => 'Help Center'])

@section('content')
    <div class="accordion" id="helpAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#newsHelp">How do I manage news?</button></h2>
            <div id="newsHelp" class="accordion-collapse collapse show" data-bs-parent="#helpAccordion"><div class="accordion-body">Open News from the dashboard sidebar to create, edit, publish, or delete news items.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accountHelp">How do I update my account?</button></h2>
            <div id="accountHelp" class="accordion-collapse collapse" data-bs-parent="#helpAccordion"><div class="accordion-body">Open Settings, update your name or email, then select Save Changes.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#partnershipHelp">How do I manage collaborations?</button></h2>
            <div id="partnershipHelp" class="accordion-collapse collapse" data-bs-parent="#helpAccordion"><div class="accordion-body">Open <a href="{{ route('partners.index') }}">Collaboration Management</a> to add, update, reorder, or remove the public collaboration entries.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqHelp">How do I update public FAQs?</button></h2>
            <div id="faqHelp" class="accordion-collapse collapse" data-bs-parent="#helpAccordion"><div class="accordion-body">Open <a href="{{ route('faqs.index') }}">FAQ Management</a> to add, update, reorder, or remove public questions and answers.</div></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
@endsection
