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

    <div class="row text-center">
        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-person-check fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Como Participar</h4>
                    <p class="text-muted">Veja os critérios de inscrição e os passos para se candidatar ao programa.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-bar-chart-line fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Resultados</h4>
                    <p class="text-muted">Acompanhe os resultados dos alunos beneficiados pelo programa.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm p-4 hover-card">
                    <i class="bi bi-book fs-1 text-primary"></i>
                    <h4 class="mt-3 text-dark">Cursos e Universidades</h4>
                    <p class="text-muted">Descubra as instituições parceiras e os cursos disponíveis no programa.</p>
                </div>
            </a>
        </div>
    </div>

    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>

@endsection
