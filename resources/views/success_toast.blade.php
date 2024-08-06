<!-- /resources/views/success_toast.blade.php -->
<style>
    .toast {
        width: fit-content;
        padding: 4px;
        background-color: #22bb33;
        display: flex;
        justify-items: center;
        align-items: center;
        gap: 4px;
    }
</style>

<div class="toast">
    <div class="alert-title">{{ $message }}</div>
    {{ $slot }}
</div>
