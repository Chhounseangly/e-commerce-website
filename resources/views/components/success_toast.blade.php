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

<div class="p-2 text-sm w-1/2 text-white rounded-xl bg-emerald-500 font-normal" role="alert">
    <span class="font-semibold mr-2">Success</span> {{ $message }}
    @if ($slot)
        {{ $slot }}
    @endif
</div>
