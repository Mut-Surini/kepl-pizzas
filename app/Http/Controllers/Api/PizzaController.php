<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PizzaServiceAPI;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    protected $apiService;
    // Menambahkan dependensi pada constructor
    public function __construct(PizzaServiceAPI
    $apiService)
    {
        $this->apiService = $apiService;
    }
    // Method untuk mendapatkan semua tim
    public function getAllPizzas()
    {
        // Ambil data tim dari API
        $pizzas = $this->apiService->getAllPizzas();
        return view('pizzas', ['data' => $pizzas]);

        // $teams = $this->apiService->getAllTeams();
        // return response()->json($pizzas);
    }
}
