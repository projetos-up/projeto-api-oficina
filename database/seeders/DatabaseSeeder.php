<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\OrdemServico;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clientes de teste
        Cliente::create(['nome' => 'Carlos Silva', 'telefone' => '(11) 98765-4321', 'cpf' => '111.222.333-44']);
        Cliente::create(['nome' => 'Ana Souza', 'telefone' => '(11) 91234-5678', 'cpf' => '555.666.777-88']);

        // Veículos de teste
        Veiculo::create(['placa' => 'ABC-1D23', 'modelo' => 'Honda Civic', 'ano' => 2021]);
        Veiculo::create(['placa' => 'XYZ-9876', 'modelo' => 'Toyota Corolla', 'ano' => 2023]);

        // Ordens de Serviço de teste
        OrdemServico::create(['placa' => 'ABC-1D23', 'descricao' => 'Troca de óleo e filtro', 'valor' => 250.00, 'status' => 'concluido']);
        OrdemServico::create(['placa' => 'XYZ-9876', 'descricao' => 'Alinhamento e balanceamento', 'valor' => 180.00, 'status' => 'em_andamento']);
        OrdemServico::create(['placa' => 'ABC-1D23', 'descricao' => 'Troca de pastilhas de freio', 'valor' => 320.00, 'status' => 'pendente']);
    }
}