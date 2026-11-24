<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

public function destroy($id)
{
    $cliente = Cliente::find($id);
    if (!$cliente) {
        return response()->json(['message' => 'Cliente não encontrado'], 404);
    }
    $cliente->delete();
    return response()->json(['message' => 'Cliente removido com sucesso'], 200);
}

    public function index()
    {
        return response()->json(Cliente::all(), 200);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }
}

