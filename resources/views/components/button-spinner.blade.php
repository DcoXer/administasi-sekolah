@props(['loading' => false])

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'flex items-center justify-center px-4 py-2 rounded bg-blue-600 text-white font-semibold hover:bg-blue-700 disabled:opacity-70 disabled:cursor-not-allowed'
]) }}
    x-data="{ loading: false }"
    x-on:click="
        loading = true;
        $el.form.submit(); // << ini yang bikin form tetep jalan
    "
    x-bind:disabled="loading">

    <template x-if="loading">
        <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </template>

    <span x-text="loading ? 'Loading...' : '{{ $slot }}'"></span>
</button>