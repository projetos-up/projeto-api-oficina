<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina Mecânica - Dupla 4</title>
    <!-- Bootstrap 5 CSS & Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-wrench-adjustable-circle"></i> Oficina Mecânica - Dupla 4</a>
            <span class="navbar-text text-white">API Laravel</span>
        </div>
    </nav>

    <div class="container-fluid px-4 pb-5">
        
        <!-- Bloco do Resumo de Ordens -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm text-white bg-dark">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <h5 class="card-title text-uppercase text-muted mb-1 fs-6">Resumo Geral da Oficina</h5>
                            <div class="h3 mb-0 fw-bold" id="resumo-text">Carregando resumo...</div>
                        </div>
                        <button onclick="carregarResumo()" class="btn btn-warning btn-lg fw-bold">
                            <i class="bi bi-graph-up-arrow"></i> Atualizar Resumo (/api/ordens-servico/resumo)
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formários de Cadastro (3 colunas) -->
        <div class="row g-4">
            <!-- Form 1: Cliente -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0 fw-bold text-primary"><i class="bi bi-person-plus-fill"></i> Cadastrar Cliente</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-cliente" onsubmit="cadastrarCliente(event)">
                            <div class="mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" id="cli-nome" class="form-control" placeholder="Ex: Roberto Alves" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="text" id="cli-telefone" class="form-control" placeholder="(11) 98888-7777" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" id="cli-cpf" class="form-control" placeholder="123.456.789-00" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold"><i class="bi bi-check-circle"></i> Salvar Cliente</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form 2: Veículo -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0 fw-bold text-success"><i class="bi bi-car-front-fill"></i> Cadastrar Veículo</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-veiculo" onsubmit="cadastrarVeiculo(event)">
                            <div class="mb-3">
                                <label class="form-label">Placa</label>
                                <input type="text" id="vei-placa" class="form-control" placeholder="ABC-1D23" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" id="vei-modelo" class="form-control" placeholder="Ex: Toyota Corolla" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ano</label>
                                <input type="number" id="vei-ano" class="form-control" placeholder="2023" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 fw-bold"><i class="bi bi-check-circle"></i> Salvar Veículo</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form 3: Ordem de Serviço -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0 fw-bold text-warning text-dark"><i class="bi bi-tools"></i> Cadastrar Ordem de Serviço</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-ordem" onsubmit="cadastrarOrdem(event)">
                            <div class="mb-3">
                                <label class="form-label">Placa do Veículo</label>
                                <input type="text" id="os-placa" class="form-control" placeholder="ABC-1D23" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição do Serviço</label>
                                <input type="text" id="os-descricao" class="form-control" placeholder="Ex: Troca de óleo" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Valor (R$)</label>
                                <input type="number" step="0.01" id="os-valor" class="form-control" placeholder="250.00" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100 fw-bold text-dark"><i class="bi bi-check-circle"></i> Salvar Ordem</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabelas de Listagem (3 colunas) -->
        <div class="row mt-4 g-4">
            <!-- Listar Clientes -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">Clientes</h5>
                        <button onclick="carregarClientes()" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-clockwise"></i> GET</button>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="lista-clientes">
                            <li class="list-group-item text-muted">Carregando...</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Listar Veículos -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">Veículos</h5>
                        <button onclick="carregarVeiculos()" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-clockwise"></i> GET</button>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="lista-veiculos">
                            <li class="list-group-item text-muted">Carregando...</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Listar Ordens de Serviço -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold">Ordens de Serviço</h5>
                        <button onclick="carregarOrdens()" class="btn btn-sm btn-outline-warning text-dark"><i class="bi bi-arrow-clockwise"></i> GET</button>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="lista-ordens">
                            <li class="list-group-item text-muted">Carregando...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Integrado com a API -->
    <script>
        const API_URL = '/api';

        // 1. Resumo Ordens de Serviço (GET)
        async function carregarResumo() {
            const res = await fetch(`${API_URL}/ordens-servico/resumo`);
            const data = await res.json();
            document.getElementById('resumo-text').innerHTML = `
                Total de Ordens: <span class="text-warning">${data.total_ordens}</span> | 
                Valor Acumulado: <span class="text-success">R$ ${parseFloat(data.valor_total).toFixed(2)}</span>
            `;
        }

        // 2. Cadastrar Cliente (POST)
        async function cadastrarCliente(e) {
            e.preventDefault();
            const cliente = {
                nome: document.getElementById('cli-nome').value,
                telefone: document.getElementById('cli-telefone').value,
                cpf: document.getElementById('cli-cpf').value
            };
            const res = await fetch(`${API_URL}/clientes`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(cliente)
            });
            if (res.ok) {
                document.getElementById('form-cliente').reset();
                carregarClientes();
            }
        }

        // 3. Cadastrar Veículo (POST)
        async function cadastrarVeiculo(e) {
            e.preventDefault();
            const veiculo = {
                placa: document.getElementById('vei-placa').value,
                modelo: document.getElementById('vei-modelo').value,
                ano: document.getElementById('vei-ano').value
            };
            const res = await fetch(`${API_URL}/veiculos`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(veiculo)
            });
            if (res.ok) {
                document.getElementById('form-veiculo').reset();
                carregarVeiculos();
            }
        }

        // 4. Cadastrar Ordem de Serviço (POST)
        async function cadastrarOrdem(e) {
            e.preventDefault();
            const ordem = {
                placa: document.getElementById('os-placa').value,
                descricao: document.getElementById('os-descricao').value,
                valor: parseFloat(document.getElementById('os-valor').value),
                status: 'pendente'
            };
            const res = await fetch(`${API_URL}/ordens-servico`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(ordem)
            });
            if (res.ok) {
                document.getElementById('form-ordem').reset();
                carregarOrdens();
                carregarResumo();
            }
        }

        // 5. Listar Clientes (GET)
        async function carregarClientes() {
            const res = await fetch(`${API_URL}/clientes`);
            const data = await res.json();
            const lista = document.getElementById('lista-clientes');
            lista.innerHTML = data.map(c => `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${c.nome}</strong><br>
                        <small class="text-muted">CPF: ${c.cpf} | Tel: ${c.telefone}</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill me-2">#${c.id}</span>
                        <button onclick="deletarCliente(${c.id})" class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                    </div>
                </li>
            `).join('') || '<li class="list-group-item text-muted">Nenhum cliente cadastrado.</li>';
        }

        // 6. Listar Veículos (GET)
        async function carregarVeiculos() {
            const res = await fetch(`${API_URL}/veiculos`);
            const data = await res.json();
            const lista = document.getElementById('lista-veiculos');
            lista.innerHTML = data.map(v => `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${v.modelo}</strong> (${v.ano})<br>
                        <small class="text-muted">Placa: ${v.placa}</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success rounded-pill me-2">#${v.id}</span>
                        <button onclick="deletarVeiculo(${v.id})" class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                    </div>
                </li>
            `).join('') || '<li class="list-group-item text-muted">Nenhum veículo cadastrado.</li>';
        }

        // 7. Listar Ordens de Serviço (GET)
        async function carregarOrdens() {
            const res = await fetch(`${API_URL}/ordens-servico`);
            const data = await res.json();
            const lista = document.getElementById('lista-ordens');
            lista.innerHTML = data.map(o => `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${o.descricao}</strong> - <span class="text-success fw-bold">R$ ${parseFloat(o.valor).toFixed(2)}</span><br>
                        <small class="text-muted">Placa: ${o.placa} | Status: ${o.status}</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-warning text-dark rounded-pill me-2">#${o.id}</span>
                        <button onclick="deletarOrdem(${o.id})" class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                    </div>
                </li>
            `).join('') || '<li class="list-group-item text-muted">Nenhuma ordem cadastrada.</li>';
        }

        // 8. Deletar Funções (DELETE)
        async function deletarCliente(id) {
            if (confirm('Deseja excluir este cliente?')) {
                const res = await fetch(`${API_URL}/clientes/${id}`, { method: 'DELETE' });
                if (res.ok) carregarClientes();
            }
        }

        async function deletarVeiculo(id) {
            if (confirm('Deseja excluir este veículo?')) {
                const res = await fetch(`${API_URL}/veiculos/${id}`, { method: 'DELETE' });
                if (res.ok) carregarVeiculos();
            }
        }

        async function deletarOrdem(id) {
            if (confirm('Deseja excluir esta ordem de serviço?')) {
                const res = await fetch(`${API_URL}/ordens-servico/${id}`, { method: 'DELETE' });
                if (res.ok) {
                    carregarOrdens();
                    carregarResumo();
                }
            }
        }

        // Carregamento automático inicial
        carregarClientes();
        carregarVeiculos();
        carregarOrdens();
        carregarResumo();
    </script>
</body>
</html>