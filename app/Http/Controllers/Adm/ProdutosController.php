<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
// use App\Common\Common;

class ProdutosController extends Controller
{
    public function __construct()
    {
    }

    /*--------------- PAGES -------------*/
    /**
     * @return \Illuminate\View\View
     */
    public function pageCadProd()
    {
        $config = [
            'ATRIBUTE_TECIDO' => env('ATRIBUTE_TECIDO'),
            'ATRIBUTE_COR' => env('ATRIBUTE_COR'),
            'ATRIBUTE_TAMANHO' => env('ATRIBUTE_TAMANHO')
        ];

        $cat = $this->selectCat();
        $marca = $this->selectMarca();
        $forn = $this->selectForn();
        $tecido = $this->selectTecido();
        $unidade = $this->selectUnidade();
        $cor = $this->selectCor();
        $tam = $this->selectTam();
        // echo json_encode($cat);
        // dd();
        // $data = 'abelha';
        return view('adm.produtos.produtos-cadastro', compact('cat', 'marca', 'forn', 'tecido', 'unidade', 'cor', 'tam', 'config'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function pageProd()
    {
        $data = $this->selectProds();
        // echo json_encode($prods);
        // dd();
        // $data = 'abelha';
        return view('adm.produtos.produtos', compact('data'));
    }

    public function pageEditProdbyId(Request $req)
    {
        $prod = $this->selectProdbyId($req->id);
        $config = [
            'ATRIBUTE_TECIDO' => env('ATRIBUTE_TECIDO'),
            'ATRIBUTE_COR' => env('ATRIBUTE_COR'),
            'ATRIBUTE_TAMANHO' => env('ATRIBUTE_TAMANHO')
        ];

        // echo json_encode($config);
        // dd();

        // $prod->cor = $this->$this->selectCorById();
        // $prod->tam = $this->$this->selectTamById();
        $cat = $this->selectCat();
        $marca = $this->selectMarca();
        $forn = $this->selectForn();
        $tecido = $this->selectTecido();
        $unidade = $this->selectUnidade();
        $cor = $this->selectCor();
        $tam = $this->selectTam();

        // echo json_encode($cat);
        // dd();
        // $data = 'abelha';
        return view('adm.produtos.produtosEditbyId', compact('prod', 'cat', 'marca', 'forn', 'tecido', 'unidade', 'cor', 'tam', 'config'));
    }

    /**
     * @return \Illuminate\View\View
     */
    // public function pageExcluiProd($id)
    // {
    //     $data = $this->selectFornecedorById($id);
    //     // echo json_encode($data);
    //     // dd();
    //     // $data = 'abelha';
    //     return view('adm.fornecedores.editFornecedor', compact('data'));
    // }
    /*--------------- END-PAGES -------------*/

    public function insertProduto(Request $req)
    {
        $flag = false;

        // $cad['cod'] = $req->cod;
        // $cad['nome'] = $req->nome;
        // $cad['categoria'] = $req->categoria;
        // $cad['marca'] = $req->marca;
        // $cad['fornecedor'] = $req->fornecedor;
        // $cad['tecido'] = $req->tecido;
        // $cad['unidade'] = $req->unidade;
        // $cad['cor'] = $req->cor;
        // $cad['tamanho'] = $req->tamanho;
        // $cad['descricao'] = $req->descricao;

        // echo json_encode($cad);
        // return;


        if (is_null($req->cod) || is_null($req->nome) || is_null($req->fornecedor)) {
            echo json_encode('Preencha todos os campos necessários');
            return;
        }

        if (DB::connection('mysql')->table('estoques')->where('codigo', $req->cod)->exists()) {
            $cad['existeCod'] = true;
            $flag = true;
        }

        if (DB::connection('mysql')->table('estoques')->where('nome', $req->nome)->exists()) {
            $cad['existeNome'] = true;
            $flag = true;
        }

        if ($flag == false) {
            try {
                DB::connection('mysql')->beginTransaction();

                DB::table('estoques')->insert(
                    [
                        'codigo' => $req->cod,
                        'categoria' => $req->categoria,
                        'nome' => $req->nome,
                        'marca' => $req->marca,
                        'descricao' => $req->descricao,
                        'tecido' => $req->tecido,
                        'estoque' => 0,
                        'unidade' => $req->unidade,
                        'fornecedor' => $req->fornecedor,
                        'lucro' => 0,
                        'preco_custo' => 0,
                        'preco' => 0
                    ]
                );


                $cad['success'] = true;
                $cad['message'] = 'Produto cadastrado com sucesso.';
                $cad['nome'] = $req->nome;
                echo json_encode($cad);
                // return;
            } catch (Exception $e) {
                DB::rollback();
                $cad['success'] = false;
                $cad['message'] = 'Erro no insert do produto. Se o erro continuar, contate o suporte.';
                $cad['mlog'] = $e->getMessage();
                echo json_encode($cad);
                return;
            }

            DB::connection('mysql')->commit();
        } else {
            $cad['success'] = false;
            $cad['message'] = 'Não foi possível cadastrar o produto';
            echo json_encode($cad);
        }
    }
    public function updateProduto(Request $req)
    {
        $flag = false;

        // $value = config('ATRIBUTE_TECIDO');
        // env('APP_DEBUG', false)

        // $cad['cod'] = $req->cod;
        // $cad['nome'] = $req->nome;
        // $cad['categoria'] = $req->categoria;
        // $cad['marca'] = $req->marca;
        // $cad['fornecedor'] = $req->fornecedor;
        // $cad['tecido'] = $req->tecido;
        // $cad['unidade'] = $req->unidade;
        // $cad['cor'] = $req->cor;
        // $cad['tamanho'] = $req->tamanho;
        // $cad['descricao'] = $req->descricao;
        // $cad['teste'] = $value;

        // echo json_encode($cad);

        // return;

        /* Verifica se tem algum campo vazio */
        if (is_null($req->cod) || is_null($req->nome) || is_null($req->fornecedor)) {
            echo json_encode('Preencha todos os campos necessários');
            $cad['success'] = false;
            return;
        }

        if (DB::connection('mysql')->table('estoques')->where('codigo', $req->cod)->exists()) {

            if ($flag == false) {

                try {
                    DB::connection('mysql')->beginTransaction();

                    $insert = DB::table('estoques')
                        ->where('codigo', $req->cod)
                        ->update([
                            'categoria' => $req->categoria,
                            'nome' => $req->nome,
                            'marca' => $req->marca,
                            'descricao' => $req->descricao,
                            'unidade' => $req->unidade,
                            'fornecedor' => $req->fornecedor
                        ]);

                    if ($insert > 0) {
                        $cad['success'] = true;
                        $cad['message'] = 'Produto atualizado com sucesso.';
                        $cad['nome'] = $req->nome;
                        echo json_encode($cad);
                        // return;
                    } else {
                        $cad['success'] = false;
                    }
                } catch (Exception $e) {
                    DB::rollback();
                    $cad['success'] = false;
                    $cad['message'] = 'Erro no update do produto. Se o erro continuar, contate o suporte.';
                    $cad['mlog'] = $e->getMessage();
                    echo json_encode($cad);
                    return;
                }
                DB::connection('mysql')->commit();
            } else {
                $cad['success'] = false;
                $cad['message'] = 'Não foi possível atualizar o produto';
                echo json_encode($cad);
            }
        }
    }

    public function selectCat()
    {
        $cat = DB::table('categorias')
            ->select('categoria')
            ->get();
        return $cat;
    }

    public function selectMarca()
    {
        $marca = DB::table('marcas')
            ->select('marca')
            ->get();
        return $marca;
    }

    public function selectTecido()
    {
        $tecido = DB::table('tecidos')
            ->select('tecido')
            ->get();
        return $tecido;
    }

    public function selectUnidade()
    {
        $marca = DB::table('unidades')
            ->select('unidade')
            ->where('status', '=', '1')
            ->get();
        return $marca;
    }

    public function selectCor()
    {
        $cor = DB::table('cors')
            ->select('cor')
            ->get();
        return $cor;
    }

    public function selectTam()
    {
        $tam = DB::table('tamanhos')
            ->select('tamanho')
            ->get();
        return $tam;
    }

    public function selectForn()
    {
        $forn = DB::table('fornecedors')
            ->select('fornecedor')
            ->get();
        return $forn;
    }

    public function selectProds()
    {
        $prods = DB::table('estoques')
            ->select('id', 'nome', 'categoria', 'codigo')
            ->orderBy('nome')
            ->get();
        return $prods;
    }

    public function selectProdbyId($id)
    {
        $prodById = DB::table('estoques')
            ->where('id', '=', $id)
            ->first();
        return $prodById;
    }

    public function selectProdbyCod(Request $req)
    {
        try {
            $prodByCod = DB::table('estoques')
                ->select('codigo', 'nome', 'categoria', 'marca', 'estoque', 'unidade', 'fornecedor', 'lucro', 'preco_custo', 'preco')
                ->where('codigo', '=', $req->cod)
                ->first();
            // dd($prodByCod);

            if ($prodByCod == null) {
                $prod['successSelect'] = false;
                $prod['message'] = 'Código não encontrado';
                echo json_encode($prod);
                return;
            }

            $prod['successSelect'] = true;
            $prod['codigo'] = $prodByCod->codigo;
            $prod['nome'] = $prodByCod->nome;
            $prod['categoria'] = $prodByCod->categoria;
            $prod['marca'] = $prodByCod->marca;
            $prod['estoque'] = $prodByCod->estoque;
            $prod['unidade'] = $prodByCod->unidade;
            $prod['fornecedor'] = $prodByCod->fornecedor;
            $prod['lucro'] = $prodByCod->lucro;
            $prod['preco_custo'] = $prodByCod->preco_custo;
            $prod['preco'] = $prodByCod->preco;
            echo json_encode($prod);
        } catch (Exception $e) {
            $prod['successSelect'] = false;
            $prod['log'] = $e;
            $prod['message'] = 'Código não encontrado';
        }
    }
}
