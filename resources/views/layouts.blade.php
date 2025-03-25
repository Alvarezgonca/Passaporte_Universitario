<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a class="navbar-brand fw-bold" href="#">Passaporte Universitário</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a id="toggleDarkMode" class="nav-link ms-2" href="#" aria-label="Alternar Modo Escuro/Claro">
                            <i class="bi bi-circle-half" id="toggleDarkMode" style="color: black;"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light text-dark ms-2" href="#"><i class="bi bi-lock"></i> Faça seu login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="content">
    @yield('header')

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="py-5 text-white d-flex flex-column align-items-center"
        style="background: linear-gradient(50deg, red, blue);">
        @include('partials.footer')
    </footer>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("toggleDarkMode").addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.toggle("dark-mode");

            // Salvar a preferência do usuário
            fetch("/toggle-dark-mode", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ darkMode: document.body.classList.contains("dark-mode") })
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
