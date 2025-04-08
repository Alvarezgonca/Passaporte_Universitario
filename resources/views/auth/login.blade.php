@extends('layouts')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div id="card" class="card text-black bg-white shadow-lg">
            <div id="card-header" class="card-header text-center border-bottom">
                <h4><i class="bi bi-person-lock"></i> Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Campo para CPF, CNPJ -->
                    <div class="mb-3">
                        <label for="document" class="form-label">CPF ou CNPJ</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="document" class="form-control document-mask" required placeholder="Digite seu CPF ou CNPJ">
                        </div>
                    </div>

                    <!-- Campo de Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Digite sua senha">
                        </div>
                    </div>

                    <!-- Lembrar-me e Esqueci minha senha -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Lembrar-me</label>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="{{ route('password.request') }}" class="link-offset-1 text-decoration-underline link-offset-2-hover">Esqueci minha senha</a>
                        </div>
                    </div>

                    <!-- Botão de Enviar -->
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>

                    <div class="d-flex justify-content-center mt-3">
                        Não tem uma conta?
                        <a href="{{ route('register') }}" class="ms-2 link-offset-1 text-decoration-underline link-offset-2-hover">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Scripts para modo dark (se já utilizado no seu layout) -->
<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var darkMode = "{{ session('theme', 'light') }}";
    //     if (darkMode == 'dark') {
    //         document.getElementById('card').classList.remove('bg-white', 'text-black');
    //         document.getElementById('card').classList.add('bg-dark', 'text-white');
    //     }
    // });

    document.addEventListener("DOMContentLoaded", function () {
        const body = document.body;
        const observer = new MutationObserver(() => {
            if (body.classList.contains("dark-mode")) {
                document.getElementById('card').classList.remove('bg-white', 'text-black');
                document.getElementById('card').classList.add('bg-dark', 'text-white');
            } else {
                document.getElementById('card').classList.add('bg-white', 'text-black');
                document.getElementById('card').classList.remove('bg-dark', 'text-white');
            }
        });

        observer.observe(body, { attributes: true, attributeFilter: ["class"] });
    });
</script>
