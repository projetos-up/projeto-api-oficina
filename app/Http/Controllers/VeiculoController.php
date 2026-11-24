<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{

public function destroy($id)
{
    $veiculo = Veiculo::find($id);
    if (!$veiculo) {
        return response()->json(['message' => 'Veículo não encontrado'], 404);
    }
    $veiculo->delete();
    return response()->json(['message' => 'Veículo removido com sucesso'], 200);
}

    public function index()
    {
        return response()->json(Veiculo::all(), 200);
    }

    public function store(Request $request)
    {
        $veiculo = Veiculo::create($request->all());
        return response()->json($veiculo, 201);
    }
}