<div class="p-4 max-w-lg mx-auto">
    <form wire:submit.prevent="submit" class="space-y-4 bg-white rounded-lg shadow-md p-5">
        <!-- Form fields -->
        {{ $this->form }}
        
        <!-- Submit button -->
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md mt-4">
            Save Time Log
        </button>
    </form>

    <!-- Success message -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
