@extends('layouts')

@section('title', 'Esqueci a Senha')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div id="card" class="card text-black bg-white shadow-lg">
                <div id="card-header" class="card-header text-center border-bottom">
                    <h4><i class="bi bi-envelope"></i> Recuperação de Senha</h4>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        Esqueceu sua senha? Sem problemas! Digite seu e-mail abaixo e enviaremos um link para redefinição de senha.
                    </div>

                    <!-- Status da Sessão -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- E-mail -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" required
                                    placeholder="Digite seu e-mail">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Botão de Enviar -->
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send"></i> Enviar Link de Redefinição
                        </button>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('login') }}" class="link-offset-1 text-decoration-underline link-offset-2-hover">
                                Voltar para o Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var darkMode = "{{session('theme', 'light')}}";
        if (darkMode == 'dark') {
            document.getElementById('card').classList.remove('bg-white', 'text-black');
            document.getElementById('card').classList.add('bg-dark', 'text-white');
        }

        const observer = new MutationObserver(() => {
            if (document.body.classList.contains("dark-mode")) {
                document.getElementById('card').classList.remove('bg-white', 'text-black');
                document.getElementById('card').classList.add('bg-dark', 'text-white');
            } else {
                document.getElementById('card').classList.add('bg-white', 'text-black');
                document.getElementById('card').classList.remove('bg-dark', 'text-white');
            }
        });

        observer.observe(document.body, { attributes: true, attributeFilter: ["class"] });
    });
</script>
