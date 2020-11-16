<?php

namespace App\Http\Controllers\Adm;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
// use App\Common\Common;

class EstoqueController extends Controller
{
    /**
     * Display page fornecedores
     * @return \Illuminate\View\View
     */
    public function pageEstoque()
    {
        // $data = $this->selectFornecedores();
        return view('adm.estoque.estoque');
    }

    public function pageEntradaEstoque()
    {
        $data = $this->selectForn();
        return view('adm.estoque.entradaEstoque', compact('data'));
    }

    public function pageAjustarEstoque()
    {
        // $data = $this->selectFornecedores();
        return view('adm.estoque.estoque');
    }

    public function selectForn()
    {
        $forn = DB::table('fornecedors')
            ->select('fornecedor')
            ->get();
        return $forn;
    }
}
