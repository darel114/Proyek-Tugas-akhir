@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="text-center">
        <h2 id="greeting" class="mb-3"></h2>

        <h4 class="typing-text text-primary mb-4">
            <span id="typing"></span>
        </h4>

        <p class="text-muted">
            <i class="fas fa-clock me-1"></i> <span id="current-time"></span>
        </p>
    </div>
</div>

<style>
    .typing-text {
        font-family: 'Courier New', monospace;
        font-weight: bold;
        overflow: hidden;
        white-space: nowrap;
        border-right: 2px solid rgba(0, 0, 0, 0.75);
        animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
        from, to { border-color: transparent; }
        50% { border-color: rgba(0, 0, 0, 0.75); }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const greetingElement = document.getElementById('greeting');
        const hour = new Date().getHours();
        let greeting = "Selamat datang";
        if (hour >= 4 && hour < 12) {
            greeting = "Selamat pagi";
        } else if (hour >= 12 && hour < 18) {
            greeting = "Selamat siang";
        } else {
            greeting = "Selamat malam";
        }
        greetingElement.innerText = greeting + ', Admin {{ auth()->user()->name }}!';

        const text = "Semoga harimu menyenangkan dan penuh produktivitas!";
        let index = 0;
        const typingEl = document.getElementById("typing");

        function type() {
            if (index < text.length) {
                typingEl.innerHTML += text.charAt(index);
                index++;
                setTimeout(type, 50);
            }
        }
        type();

        function updateTime() {
            const now = new Date();
            const jam = now.getHours().toString().padStart(2, '0');
            const menit = now.getMinutes().toString().padStart(2, '0');
            const detik = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('current-time').innerText = `${jam}:${menit}:${detik}`;
        }

        updateTime();
        setInterval(updateTime, 1000);
    });
</script>
@endsection
