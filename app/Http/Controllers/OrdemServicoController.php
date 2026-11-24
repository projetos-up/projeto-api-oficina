<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    public function index()
    {
        return response()->json(OrdemServico::all(), 200);
    }

    public function store(Request $request)
    {
        $ordem = OrdemServico::create($request->all());
        return response()->json($ordem, 201);
    }

    public function destroy($id)
    {
        $ordem = OrdemServico::find($id);
        if (!$ordem) {
            return response()->json(['message' => 'Ordem de serviço não encontrada'], 404);
        }
        $ordem->delete();
        return response()->json(['message' => 'Ordem removida com sucesso'], 200);
    }

    public function resumo()
    {
        $totalOrdens = OrdemServico::count();
        $valorTotal = OrdemServico::sum('valor');

        return response()->json([
            'total_ordens' => $totalOrdens,
            'valor_total'  => (float) $valorTotal
        ], 200);
    }
}