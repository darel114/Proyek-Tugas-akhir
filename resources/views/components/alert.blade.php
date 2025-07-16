@if (session('success') || session('error') || $errors->any())
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div class="toast align-items-center text-white bg-{{ session('success') ? 'success' : 'danger' }} border-0 show animate__animated animate__fadeInDown" role="alert" data-bs-delay="4000" data-bs-autohide="true">
        <div class="d-flex">
            <div class="toast-body">
                @if (session('success'))
                    {{ session('success') }}
                @elseif (session('error'))
                    {{ session('error') }}
                @elseif ($errors->any())
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
