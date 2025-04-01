@extends('layouts')

@section('title', 'Registro')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div id="card" class="card text-black bg-white shadow-lg">
            <div id="card-header" class="card-header text-center border-bottom">
                <h4><i class="bi bi-person-plus"></i> Registro</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nome -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" id="name" class="form-control" required
                                placeholder="Digite seu nome" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control" required
                                placeholder="Digite seu e-mail" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" required
                                placeholder="Digite sua senha">
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required
                                placeholder="Confirme sua senha">
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Link para Login -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('login') }}" class="link-offset-1 text-decoration-underline link-offset-2-hover">
                            Já tem uma conta?
                        </a>
                    </div>

                    <!-- Botão de Enviar -->
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle"></i> Registrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Scripts para Dark Mode -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var darkMode = "{{ session('theme', 'light') }}";
        const cardElement = document.getElementById('card');
        if (darkMode == 'dark') {
            cardElement.classList.remove('bg-white', 'text-black');
            cardElement.classList.add('bg-dark', 'text-white');
        } else {
            cardElement.classList.remove('bg-dark', 'text-white');
            cardElement.classList.add('bg-white', 'text-black');
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const body = document.body;
        const observer = new MutationObserver(() => {
            const cardElement = document.getElementById('card');
            if (body.classList.contains("dark-mode")) {
                cardElement.classList.remove('bg-white', 'text-black');
                cardElement.classList.add('bg-dark', 'text-white');
            } else {
                cardElement.classList.remove('bg-dark', 'text-white');
                cardElement.classList.add('bg-white', 'text-black');
            }
        });
        observer.observe(body, { attributes: true, attributeFilter: ["class"] });
    });
</script>
