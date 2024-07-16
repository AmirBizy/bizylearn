<button {{ $attributes->merge(['type' => 'submit' , 'id' => 'custom_primary_btn']) }}>
    {{ $slot }}
</button>
