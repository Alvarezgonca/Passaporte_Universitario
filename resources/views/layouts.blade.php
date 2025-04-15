<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo_sem_fundo.png') }}" type="img/jpg">
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

    <!-- Estilos para sidebar e efeito push -->
    <style>
        /* Sidebar: inicialmente escondido fora da tela à esquerda */
        #sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            /* Fora da tela */
            width: 250px;
            height: 100vh;
            background-color: #fff;
            transition: left 0.3s ease;
            z-index: 900;
            padding-top: 70px;
            /* Espaço para o botão de hamburguer não ser encoberto */
        }

        /* Sidebar aberto */
        #sidebar.active {
            left: 0;
        }

        /* Contêiner que engloba toda a página (navbar + conteúdo) */
        #page-wrapper {
            transition: margin-left 0.3s ease;
            position: relative;
            z-index: 1000;
        }

        /* Quando o sidebar está ativo, empurra o contêiner para a direita */
        #page-wrapper.shifted {
            margin-left: 250px;
        }

        /* Botão de hamburguer – posicionado absoluto dentro do wrapper */
        #hamburgerBtn {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: transparent;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        /* Em telas maiores você pode optar por esconder ou reposicionar o botão, se desejar */
        @media (min-width: 992px) {
            #hamburgerBtn {
                /* Por exemplo, manter exibido ou reposicionar se necessário */
                display: block;
            }
        }
    </style>
</head>

<body>
    @auth
        <!-- Sidebar do menu (só para usuários autenticados) -->
        <div id="sidebar">
            <ul class="list-unstyled d-flex flex-column">
                <span class="ms-5">
                    <li>
                        <a href="/" class="text-decoration-none d-block py-2">
                            <i class="bi bi-house"></i> Início
                        </a>
                    </li>
                    <li>
                        <a href="/sobre" class="text-decoration-none d-block py-2">
                            <i class="bi bi-info-circle"></i> Sobre
                        </a>
                    </li>
                    <li>
                        <a href="/contato" class="text-decoration-none d-block py-2">
                            <i class="bi bi-envelope"></i> Contato
                        </a>
                    </li>
                </span>
            </ul>
        </div>
    @endauth

    <!-- Contêiner que engloba a navbar e o conteúdo principal -->
    <div id="page-wrapper">


        <!-- Navbar -->
        <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-red shadow fixed-top">
            @auth
                <!-- Botão de hambúrguer, dentro do wrapper para mover junto -->
                <button id="hamburgerBtn">
                    <i class="fas fa-bars"></i>
                </button>
            @endauth
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Passaporte Universitário</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
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
                                <i class="bi bi-circle-half" id="darkModeIcon"
                                    style="color: black; filter: invert(1);"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            @if (Auth::check())
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-5"></i>
                                    <span class="ms-1">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('perfil.index') }}">
                                            <i class="bi bi-person"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right"></i> Sair
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <a class="btn btn-light text-dark ms-2" href="{{ route('login') }}">
                                    <i class="bi bi-lock"></i> Faça seu login
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo da página -->
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
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Ajusta o padding da .content conforme o tamanho da navbar -->
    <script>
        function adjustNavbar() {
            var navbar = document.querySelector('.navbar');
            var content = document.querySelector('.content');
            var navbarHeight = navbar.offsetHeight;
            content.style.paddingTop = navbarHeight + 'px';
        }
        document.addEventListener('DOMContentLoaded', adjustNavbar);
        window.addEventListener('resize', adjustNavbar);
    </script>

    <!-- Script para o sidebar push -->
    @auth
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const hamburgerBtn = document.getElementById('hamburgerBtn');
                const sidebar = document.getElementById('sidebar');
                const pageWrapper = document.getElementById('page-wrapper');

                hamburgerBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('active');
                    pageWrapper.classList.toggle('shifted');
                });
            });
        </script>
    @endauth

    <!-- Scripts do dark mode -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const darkModePreference = "{{ session('theme', 'light') }}";
            const body = document.body;
            const darkModeIcon = document.getElementById("darkModeIcon");

            if (darkModePreference === "dark") {
                body.classList.add("dark-mode");
                darkModeIcon.classList.replace("bi-circle-half", "bi-moon-stars-fill");
            } else {
                darkModeIcon.classList.replace("bi-moon-stars-fill", "bi-circle-half");
            }

            document.getElementById("toggleDarkMode").addEventListener("click", function (event) {
                event.preventDefault();
                const isDarkMode = body.classList.toggle("dark-mode");

                if (isDarkMode) {
                    darkModeIcon.classList.replace("bi-circle-half", "bi-moon-stars-fill");
                } else {
                    darkModeIcon.classList.replace("bi-moon-stars-fill", "bi-circle-half");
                }
                this.classList.add("disabled");
                fetch("{{ route('toggle-theme') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                    .then(response => response.json())
                    .then(data => console.log("Tema atualizado:", data.theme))
                    .catch(error => {
                        console.error("Erro ao alternar o tema:", error);
                        body.classList.toggle("dark-mode");
                    })
                    .finally(() => {
                        this.classList.remove("disabled");
                    });
            });
        });
    </script>

    <script src="https://unpkg.com/imask"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.document-mask');
            inputs.forEach(input => {
                IMask(input, {
                    mask: [
                        { mask: '000.000.000-00', maxLength: 11 },
                        { mask: '00.000.000/0000-00', maxLength: 14 }
                    ],
                    dispatch: function (appended, dynamicMasked) {
                        const number = (dynamicMasked.value + appended).replace(/\D/g, '');
                        return number.length > 11 ? dynamicMasked.compiledMasks[1] : dynamicMasked.compiledMasks[0];
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
