<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/logo_sem_fundo.png')}}" type="img/jpg">
    <title>Passaporte Universitário de Maricá</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @if(session('dark-mode'))
        <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}">
    @endif
</head>

<body>
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-red shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Passaporte Universitário</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Contato</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a id="toggleDarkMode" class="nav-link" href="#" aria-label="Alternar Modo Escuro/Claro">
                            <i class="bi bi-circle-half" id="darkModeIcon" style="color: black; filter: invert(1);"></i>
                            {{-- <i class="bi bi-circle-half" id="darkModeIcon" style="color: black;"></i> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light text-dark ms-2" href="{{route('login')}}"><i class="bi bi-lock"></i>
                            Faça seu login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('header')

        @if (View::hasSection('content'))
            <main class="container my-5">
                @yield('content')
            </main>
        @endif

        <footer class="py-5 text-white d-flex flex-column align-items-center"
            style="background: linear-gradient(50deg, red, blue);">
            @include('partials.footer')
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const darkModePreference = "{{ session('theme', 'light') }}"; // Obtém o tema salvo na sessão
            const body = document.body;
            const darkModeIcon = document.getElementById("darkModeIcon");

            // Aplica o tema salvo na sessão
            if (darkModePreference === "dark") {
                body.classList.add("dark-mode");
                darkModeIcon.classList.replace("bi-circle-half", "bi-moon-stars-fill"); // Ícone de modo escuro
            } else {
                darkModeIcon.classList.replace("bi-moon-stars-fill", "bi-circle-half"); // Ícone de modo claro
            }

            document.getElementById("toggleDarkMode").addEventListener("click", function (event) {
                event.preventDefault();
                const isDarkMode = body.classList.toggle("dark-mode"); // Alterna a classe no body

                // Alterna o ícone de acordo com o tema
                if (isDarkMode) {
                    darkModeIcon.classList.replace("bi-circle-half", "bi-moon-stars-fill");
                } else {
                    darkModeIcon.classList.replace("bi-moon-stars-fill", "bi-circle-half");
                }

                // Desativa o botão temporariamente para evitar múltiplos cliques
                this.classList.add("disabled");

                fetch("{{ route('toggle-theme') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                }).then(response => response.json())
                    .then(data => console.log("Tema atualizado:", data.theme))
                    .catch(error => {
                        console.error("Erro ao alternar o tema:", error);
                        body.classList.toggle("dark-mode"); // Reverte caso haja erro
                    })
                    .finally(() => {
                        this.classList.remove("disabled"); // Reativa o botão
                    });
            });
        });



    </script>
    <script>
        // Função para ajustar a margem superior do conteúdo com base na altura da navbar fixa
        function adjustNavbar() {
            var navbar = document.querySelector('.navbar'); // Seleciona a navbar fixa
            var content = document.querySelector('.content'); // Seleciona o conteúdo

            // Verifica a altura da navbar
            var navbarHeight = navbar.offsetHeight;

            // Ajusta o padding-top do conteúdo para não sobrepor a navbar
            content.style.paddingTop = navbarHeight + 'px';
        }

        // Chama a função ao carregar a página e ao redimensionar a janela
        window.addEventListener('load', adjustNavbar);
        window.addEventListener('resize', adjustNavbar);
    </script>

    @stack('scripts')
</body>

</html>
