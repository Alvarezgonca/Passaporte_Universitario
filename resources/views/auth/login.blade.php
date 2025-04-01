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

                        <!-- Escolher Tipo de Login -->
                        <div class="mb-3">
                            <label for="loginType" class="form-label">Entrar com:</label>
                            <select id="loginType" class="form-select">
                                <option value="cpf">CPF ou CNPJ</option>
                                <option value="email">E-mail</option>
                            </select>
                        </div>

                        <!-- CPF ou CNPJ -->
                        <div class="mb-3" id="cpfField">
                            {{-- <label for="document" class="form-label">CPF ou CNPJ</label> --}}
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="document" id="document" class="form-control" required
                                    placeholder="Digite seu CPF ou CNPJ">
                            </div>
                        </div>

                        <!-- E-mail -->
                        <div class="mb-3 d-none" id="emailField">
                            {{-- <label for="email" class="form-label">E-mail</label> --}}
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Digite seu e-mail">
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            {{-- <label for="password" class="form-label">Senha</label> --}}
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control" required
                                    placeholder="Digite sua senha">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Lembrar-me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>
                            <!-- Esqueci minha senha -->
                            <div class="mb-3 text-center">
                                <a href="{{ route('password.request') }}"
                                    class="link-offset-1 text-decoration-underline link-offset-2-hover">Esqueci minha
                                    senha</a>
                            </div>
                        </div>

                        <!-- Botão de Enviar -->
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-box-arrow-in-right"></i>
                            Entrar
                        </button>

                        <div class="d-flex justify-content-center mt-3">
                            Não tem uma conta?
                            <a href="{{ route('register') }}"
                                class="ms-2 link-offset-1 text-decoration-underline link-offset-2-hover">Cadastre-se</a>
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
            // Passar o Card para o modo escuro
            document.getElementById('card').classList.remove('bg-white', 'text-black');
            document.getElementById('card').classList.add('bg-dark', 'text-white');
        } else {
            console.log("Light Mode content loaded");
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const body = document.body;

        const observer = new MutationObserver(() => {
            if (body.classList.contains("dark-mode")) {
                // Passar o Card para o modo escuro
                document.getElementById('card').classList.remove('bg-white', 'text-black');
                document.getElementById('card').classList.add('bg-dark', 'text-white');
            } else {
                // Passar o Card para o modo escuro
                document.getElementById('card').classList.add('bg-white', 'text-black');
                document.getElementById('card').classList.remove('bg-dark', 'text-white');
            }
        });

        observer.observe(body, { attributes: true, attributeFilter: ["class"] });

        // Script para alternar entre CPF/CNPJ e E-mail
        const loginType = document.getElementById("loginType");
        const cpfField = document.getElementById("cpfField");
        const emailField = document.getElementById("emailField");

        loginType.addEventListener("change", function () {
            if (this.value === "email") {
                cpfField.classList.add("d-none");
                emailField.classList.remove("d-none");
            } else {
                cpfField.classList.remove("d-none");
                emailField.classList.add("d-none");
            }
        });
    });
</script>
