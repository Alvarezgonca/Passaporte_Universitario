@extends('layouts')

@section('title', 'Perfil do Aluno | Passaporte Universitário')

@section('content')
<div class="container py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold d-flex align-items-center gap-2">
                    <i class="bi bi-person-badge fs-3 text-primary"></i>
                    Perfil do Aluno
                </h2>
                <p class="text-muted mb-0">Acompanhe suas informações e progresso no programa</p>
            </div>
            <div class="d-none d-md-block">
                <img src="{{ asset('img/logo_sem_fundo.png') }}" alt="Logo Passaporte" height="60px">
            </div>
        </div>
    </div>

    <!-- Main Profile Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-primary bg-gradient text-white py-3">
            <h5 class="mb-0 fw-semibold">Informações do Estudante</h5>
        </div>
        <div class="card-body">
            <div class="row g-0">
                <!-- Profile Picture & Basic Info -->
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="position-relative d-inline-block">
                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=200"
                            alt="Foto do aluno"
                            class="rounded-circle img-thumbnail shadow-sm border-primary"
                            style="width: 180px; height: 180px; object-fit: cover;"
                        >
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-white">
                            <i class="bi bi-check-lg text-white"></i>
                        </span>
                    </div>
                    <h4 class="mt-3 mb-1 fw-bold">{{ Auth::user()->name }}</h4>
                    <div class="text-muted small">
                        <p class="mb-1"><i class="bi bi-person-vcard me-1"></i> Mat. 202322104</p>
                        <p class="mb-1"><i class="bi bi-envelope me-1"></i> {{ Auth::user()->email }}</p>
                        <p class="mb-0"><i class="bi bi-telephone me-1"></i> (21) 99999-9999</p>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="col-md-9 ps-md-4">
                    <div class="row g-4">
                        <!-- University Info -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-primary">
                                        <i class="bi bi-buildings me-2"></i>Instituição
                                    </h6>
                                    <h5 class="card-title mb-0">Universidade de Vassouras</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-primary">
                                        <i class="bi bi-book me-2"></i>Curso
                                    </h6>
                                    <h5 class="card-title mb-0">Engenharia de Software</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Semester Info -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-primary">
                                        <i class="bi bi-calendar3 me-2"></i>Período Atual
                                    </h6>
                                    <h5 class="card-title mb-0">5º Semestre</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule Info -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-primary">
                                        <i class="bi bi-clock me-2"></i>Turno
                                    </h6>
                                    <h5 class="card-title mb-0">Noturno</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Section -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-primary bg-gradient text-white py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-graph-up me-2"></i>Progresso da Contrapartida
            </h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            role="progressbar" style="width: 55%" aria-valuenow="165" aria-valuemin="0" aria-valuemax="300">
                            55% Concluído
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <h4 class="mb-0 fw-bold text-success">165 / 300 horas</h4>
                    <small class="text-muted">Horas cumpridas</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-primary bg-gradient text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-calendar-check me-2"></i>Atividades Realizadas
            </h5>
            <button class="btn btn-sm btn-light">
                <i class="bi bi-plus-lg me-1"></i>Nova Atividade
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Data</th>
                            <th>Atividade</th>
                            <th>Horas</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">04/07/2024</td>
                            <td>
                                <div class="fw-semibold">Mutirão de Saúde</div>
                                <small class="text-muted">Apoio administrativo</small>
                            </td>
                            <td>10h</td>
                            <td><span class="badge bg-success rounded-pill">Aprovado</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">22/06/2024</td>
                            <td>
                                <div class="fw-semibold">Evento da Prefeitura</div>
                                <small class="text-muted">Organização e recepção</small>
                            </td>
                            <td>8h</td>
                            <td><span class="badge bg-success rounded-pill">Aprovado</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">10/06/2024</td>
                            <td>
                                <div class="fw-semibold">Campanha Solidária</div>
                                <small class="text-muted">Arrecadação de alimentos</small>
                            </td>
                            <td>7h</td>
                            <td><span class="badge bg-success rounded-pill">Aprovado</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">28/05/2024</td>
                            <td>
                                <div class="fw-semibold">Reforço Escolar</div>
                                <small class="text-muted">Escola Municipal</small>
                            </td>
                            <td>6h</td>
                            <td><span class="badge bg-warning text-dark rounded-pill">Pendente</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">12/05/2024</td>
                            <td>
                                <div class="fw-semibold">Manutenção de Laboratório</div>
                                <small class="text-muted">Laboratório de Informática</small>
                            </td>
                            <td>4h</td>
                            <td><span class="badge bg-warning text-dark rounded-pill">Pendente</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-download"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light text-end py-3">
            <a href="#" class="btn btn-primary btn-sm">
                Ver Todas as Atividades <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header bg-primary bg-gradient text-white py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-person-lines-fill me-2"></i>Informações Pessoais
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted small">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span> <!-- corrigido -->
                            <input type="text" class="form-control" value="daniel@daniel.com" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small">Telefone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span> <!-- corrigido -->
                            <input type="text" class="form-control" value="(99) 99999-9999" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted small">Data de Nascimento</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar"></i></span> <!-- corrigido -->
                            <input type="text" class="form-control" value="15/02/2002" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small">CPF/CNPJ</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span> <!-- corrigido -->
                            <input type="text" class="form-control document-mask" value="123.456.789-00" readonly>
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label text-muted small">RG</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                            <input type="text" class="form-control" value="12.345.678-9" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small">Órgão Expedidor</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" class="form-control" value="DETRAN-RJ" readonly>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="card-footer bg-light text-end py-3">
            <button class="btn btn-primary btn-sm">
                <i class="bi bi-pencil me-1"></i>Editar Informações
            </button>
        </div>
    </div>
</div>


@endsection

@push('styles')
<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .progress {
        border-radius: 1rem;
    }
    .progress-bar {
        border-radius: 1rem;
    }
    .table td, .table th {
        padding: 1rem;
    }
    .badge {
        padding: 0.5em 1em;
    }
    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }
    .form-control[readonly] {
        background-color: #fff;
        border-left: none;
    }
    .rounded-4 {
        border-radius: 1rem !important;
    }
</style>
@endpush
