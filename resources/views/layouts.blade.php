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
</head>

<body>

    <!-- Navbar -->
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
                    <!-- Ícone de alternância -->
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


    <!-- Hero Section -->
    @yield('header')

    <!-- Conteúdo Principal -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="py-5 text-white d-flex flex-column align-items-center"
        style="background: linear-gradient(50deg, red, blue);">
        <div class="container">
            <div class="row g-4 justify-content-center text-center text-lg-start">
                <!-- Left Column -->
                <div class="col-lg-6 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 class="h3 mb-4 fs-3">
                        Secretaria de<br>
                        <span class="fw-bold display-5 fs-1">Educação</span>
                    </h2>
                    <img src="{{ asset('img/secretaria_marica.png') }}" alt="Secretaria de Educação de Maricá"
                        class="img-fluid mb-3" style="max-width: 250px">
                    <div class="mt-3">
                        <a href="https://www.marica.rj.gov.br/"
                            class="text-white text-decoration-none d-flex align-items-center fs-5 justify-content-center justify-content-lg-start"
                            target="_blank">
                            <i class="bi bi-link-45deg me-2 fs-5"></i>
                            www.marica.rj.gov.br
                        </a>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 class="h3 mb-4 fs-3">
                        <a href="#" class="text-white text-decoration-none fs-3">
                            Fale Conosco
                        </a>
                    </h2>

                    <div class="mb-3 fs-5">
                        <p class="d-flex align-items-center justify-content-center justify-content-lg-start mb-2">
                            <i class="bi bi-telephone-fill me-2 fs-5"></i>
                            (21) 2637-2052 ramal 551 | (21) 99202-4725
                        </p>
                        <p class="mb-2">
                            <a href="mailto:passaporte@sctf.marica.rj.gov.br"
                                class="text-white text-decoration-none d-flex align-items-center justify-content-center justify-content-lg-start fs-5">
                                <i class="bi bi-envelope-fill me-2 fs-5"></i>
                                passaporte@sctf.marica.rj.gov.br
                            </a>
                        </p>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="social-media mt-4 d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a href="https://www.facebook.com/Passaporte-Universitário-Maricá-405931809972671"
                            class="text-white" target="_blank">
                            <i class="bi bi-facebook fs-3"></i>
                        </a>
                        <a href="https://twitter.com/passaporteuniv1" class="text-white" target="_blank">
                            <i class="bi bi-twitter fs-3"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCfVNNDSrnkn3u3HWWrtV6AA" class="text-white"
                            target="_blank">
                            <i class="bi bi-youtube fs-3"></i>
                        </a>
                        <a href="https://instagram.com/passaporte.universitario" class="text-white" target="_blank">
                            <i class="bi bi-instagram fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function adjustBodyPadding() {
            const navbar = document.getElementById("mainNavbar");
            document.body.style.paddingTop = navbar.offsetHeight + "px";
        }

        // Ajusta ao carregar e ao redimensionar a tela
        window.addEventListener("load", adjustBodyPadding);
        window.addEventListener("resize", adjustBodyPadding);
    </script>

<script>
    document.getElementById("toggleDarkMode").addEventListener("click", function (event) {
        event.preventDefault(); // Impede o comportamento padrão do link (evita navegação)

        // Alterna a classe 'dark-mode' no body
        document.body.classList.toggle("dark-mode");

        // Obtém o ícone dentro do botão
        const modeIcon = this.querySelector("i");

        // Alterna os ícones dependendo do estado do modo escuro
        if (document.body.classList.contains("dark-mode")) {
            // Modo escuro: Ícone branco
            modeIcon.style.color = "white";  // Cor branca para o ícone no modo escuro
        } else {
            // Modo claro: Ícone preto
            modeIcon.style.color = "black";  // Cor preta para o ícone no modo claro
        }
    });
</script>

    @stack('scripts')

</body>

</html>
