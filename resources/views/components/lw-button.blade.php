<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'inline-flex items-center uppercase justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest focus:outline-none transition ease-in-out duration-150'
    ]) }}>
    {{ $slot }}
</button>

