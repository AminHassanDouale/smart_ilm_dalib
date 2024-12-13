<?php
// resources/views/livewire/homepages/resources.blade.php
use Livewire\Volt\Component;

new class extends Component {
    public function mount()
    {
        Log::info('Resources component mounted', [
            'auth_check' => auth()->check(),
            'user_id' => auth()->id()
        ]);
    }
}; ?>

<div>
    @php
        Log::info('Resources view rendered', [
            'time' => now()->toDateTimeString()
        ]);
    @endphp

    <h1>Resources Page</h1>
    <p>You are logged in!</p>
</div>
