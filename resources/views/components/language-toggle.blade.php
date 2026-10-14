<form action="{{ route('language.update') }}" method="POST" class="language-toggle" aria-label="{{ __('Choose website language') }}">
    @csrf
    <button type="submit" name="language" value="id" class="language-toggle-button {{ app()->getLocale() === 'id' ? 'active' : '' }}" aria-label="{{ __('Switch to Indonesian') }}" title="{{ __('Switch to Indonesian') }}">
        <img src="{{ asset('images/id.png') }}" width="22" height="15" alt="{{ __('Indonesian') }}">
    </button>
    <button type="submit" name="language" value="en" class="language-toggle-button {{ app()->getLocale() === 'en' ? 'active' : '' }}" aria-label="{{ __('Switch to English') }}" title="{{ __('Switch to English') }}">
        <img src="{{ asset('images/us.png') }}" width="22" height="15" alt="{{ __('English') }}">
    </button>
</form>
