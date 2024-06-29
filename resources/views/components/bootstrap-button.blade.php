<!-- resources/views/components/bootstrap-button.blade.php -->
<button {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot }}
</button>
