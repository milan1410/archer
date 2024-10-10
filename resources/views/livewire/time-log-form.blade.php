<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <button type="submit" class="btn btn-primary mt-4">Save Time Log</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
