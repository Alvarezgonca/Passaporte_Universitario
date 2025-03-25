@extends('layouts')

@section('content')

    @section('header')
        <!-- Carrossel -->
        <div id="carouselPassaporte" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselPassaporte" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselPassaporte" data-bs-slide-to="1"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/fotinho_passaporte.jpg') }}" class="d-block w-100" alt="Benefícios do programa">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/fotinho2_passaporte.jpeg') }}" class="d-block w-100" alt="Estude sem preocupações">
                </div>
            </div>

            <!-- Botões de navegação -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPassaporte" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselPassaporte" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endsection

    <!-- Cards de Acesso Rápido -->
    <div class="row text-center">
        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-person-check fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Como Participar</h4>
                    <p class="text-muted">Saiba os requisitos necessários e entenda todo o processo de inscrição no programa.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-bar-chart-line fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Resultados</h4>
                    <p class="text-muted">Confira os aprovados, os critérios de avaliação e os próximos passos do programa.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-book fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Cursos e Universidades</h4>
                    <p class="text-muted">Veja as faculdades credenciadas, os cursos disponíveis e como escolher o seu.</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Seção Legislação -->
    <div id="legislacao" class="container mt-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="primary-text mb-4">
                    <img class="mr-1" src="https://passaporteuniversitario.marica.rj.gov.br/images/icone-legislacao.png"
                        width="60" alt="Icone Legislação">
                    Legislação
                </h1>
                <p class="paragraph">
                    Confira toda a legislação do programa: leis, decretos, resoluções, portarias, editais, etc.
                </p>
                <a href="https://passaporteuniversitario.marica.rj.gov.br/legislacao" class="btn btn-lg btn-dark-blue">
                    <i class="bi bi-box-arrow-up-right me-1"></i>
                    Acesse a legislação
                </a>

            </div>
            <div class="col-lg-6">
                <img src="https://passaporteuniversitario.marica.rj.gov.br/images/imagem-legislacao.svg" class="img-fluid"
                    alt="Imagem Legislação">
            </div>
        </div>
    </div>

    <!-- Seção Perguntas Frequentes -->
    <div id="perguntas-frequentes" class="container mt-5">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <img src="https://passaporteuniversitario.marica.rj.gov.br/images/imagem-perguntas-frequentes.svg"
                    class="img-fluid" alt="Imagem Perguntas Frequentes">
            </div>
            <div class="col-lg-6">
                <h1 class="primary-text mb-4">
                    <img class="mr-1"
                        src="https://passaporteuniversitario.marica.rj.gov.br/images/icone-perguntas-frequentes.png"
                        width="60" alt="Icone Perguntas Frequentes">
                    Perguntas Frequentes
                </h1>
                <p class="paragraph">
                    Confira as perguntas frequentes que mais recebemos e tire suas dúvidas sobre o programa.
                </p>
                <a href="#"
                    class="btn btn-lg btn-dark-blue">
                    <i class="bi bi-box-arrow-up-right me-1"></i>
                    Ver Perguntas Frequentes
                </a>
            </div>
        </div>
    </div>

    <style>
        .btn-dark-blue {
            background-color: #004085;
            border-color: #004085;
            color: #fff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-dark-blue:hover {
            background-color: #105094;
            border-color: #105094;
            color: #fff;
        }

        .btn-dark-blue:active {
            background-color: #002752 !important;
            /* Um azul mais escuro */
            border-color: #002752 !important;
            color: #fff !important;
            box-shadow: none !important;
        }

        .hover-card {
            height: 100%; /* Garante que todos os cards tenham a mesma altura */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25); /* Sombra mais visível */
            border-radius: 8px; /* Adiciona borda arredondada */
            background-color: #fff; /* Cor de fundo para o card */
        }

        .hover-card p {
            min-height: 48px; /* Define uma altura mínima para o texto */
        }

        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3); /* Sombra mais intensa ao passar o mouse */
        }
    </style>

@endsection
