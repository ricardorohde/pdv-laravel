<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Common\Common;

class FornecedoresController extends Controller
{
    public function __construct()
    {
    }

    public function insertFornecedor(Request $req)
    {
        $flag = false;

        $common = new Common();
        $req->tel = $common->onlyNumbers($req->tel);
        $req->cnpj = $common->onlyNumbers($req->cnpj);
        $req->cep = $common->onlyNumbers($req->cep);

        // $cad['razao'] = $req->razao;
        // $cad['fantasia'] = $req->fantasia;
        // $cad['cnpj'] = $req->cnpj;
        // $cad['tel'] = $req->tel;
        // $cad['cep'] = $req->cep;
        // $cad['logradouro'] = $req->logradouro;
        // $cad['numero'] = $req->numero;
        // $cad['bairro'] = $req->bairro;
        // $cad['cidade'] = $req->cidade;
        // $cad['uf'] = $req->uf;
        // $cad['obs'] = $req->obs;

        // echo json_encode($cad);
        // return;


        if (is_null($req->razao) || is_null($req->fantasia) || is_null($req->cnpj)) {
            echo json_encode('Preencha todos os campos necessários');
            return;
        }

        if (DB::connection('mysql')->table('fornecedors')->where('fornecedor', $req->razao)->exists()) {
            $cad['existeRazao'] = true;
            $flag = true;
        }

        if (DB::connection('mysql')->table('fornecedors')->where('cnpj', $req->cnpj)->exists()) {
            $cad['existeCNPJ'] = true;
            $flag = true;
        }

        if ($flag == false) {
            try {
                DB::connection('mysql')->beginTransaction();

                DB::table('fornecedors')->insert(
                    [
                        'fornecedor' => $req->razao,
                        'fantasia' => $req->fantasia,
                        'cnpj' => $req->cnpj,
                        'telefone' => $req->tel,
                        'numero' => $req->numero,
                        'logradouro' => $req->logradouro,
                        'bairro' => $req->bairro,
                        'cidade' => $req->cidade,
                        'estado' => $req->uf,
                        'cep' => $req->cep,
                        'observacao' => $req->obs
                    ]
                );


                $cad['success'] = true;
                $cad['message'] = 'Fornecedor cadastrado com sucesso.';
                $cad['razao'] = $req->razao;
                echo json_encode($cad);
                // return;
            } catch (Exception $e) {
                DB::rollback();
                $cad['success'] = false;
                $cad['message'] = 'Erro no insert do fornecedor. Se o erro continuar, contate o suporte.';
                $cad['mlog'] = $e->getMessage();
                echo json_encode($cad);
                return;
            }

            DB::connection('mysql')->commit();
        } else {
            $cad['success'] = false;
            $cad['message'] = 'Não foi possível cadastrar o fornecedor';
            echo json_encode($cad);
        }
    }

    /**
     * Display page fornecedores
     * @return \Illuminate\View\View
     */
    public function pageFornecedores()
    {
        $data = $this->selectFornecedores();
        // echo json_encode($data);
        // dd();
        // $data = 'abelha';
        return view('adm.fornecedores', compact('data'));
    }

    /**
     * Display page edit fornecedores
     * @return \Illuminate\View\View
     */
    public function pageEditFornecedor($id)
    {
        $data = $this->selectFornecedorById($id);
        // echo json_encode($data);
        // dd();
        // $data = 'abelha';
        return view('adm.fornecedores.editFornecedor', compact('data'));
    }

    public function selectFornecedores()
    {
        $dataForn = DB::table('fornecedors')
            ->orderBy('fornecedor')
            ->get();
        return $dataForn;
    }

    public function selectFornecedorById($id)
    {
        $dataForn = DB::table('fornecedors')
            ->where('id', '=', $id)
            ->first();
        return $dataForn;
    }

    public function updateFornecedor(Request $req)
    {
        $flag = false;

        $common = new Common();
        $req->tel = $common->onlyNumbers($req->tel);
        $req->cnpj = $common->onlyNumbers($req->cnpj);

        /* Verifica se tem algum campo vazio */
        if (is_null($req->razao) || is_null($req->fantasia) || is_null($req->cnpj)) {
            echo json_encode('Preencha todos os campos necessários');
            return;
        }

        /* Faz a busca do Id referente ao Cnpj no banco de dados */
        $idRazao = $this->buscaIdByCnpj($req->cnpj);

        // $cad['success34'] = $idRazao->id;
        // $cad['success'] = $req->cnpj;
        // $cad['success2'] = $req->razao;
        // $cad['success3'] = $req->fantasia;
        // $cad['message'] = $req->tel;
        // echo json_encode($cad);
        // return;


        if (DB::connection('mysql')->table('fornecedors')->where('cnpj', $req->cnpj)->exists()) {

            if ($flag == false) {

                try {
                    DB::connection('mysql')->beginTransaction();

                    $insert = DB::table('fornecedors')
                        ->where('id', $idRazao->id)
                        ->update([
                            'fornecedor' => $req->razao,
                            'fantasia' => $req->fantasia,
                            'telefone' => $req->tel,
                            'numero' => $req->numero,
                            'logradouro' => $req->logradouro,
                            'bairro' => $req->bairro,
                            'cidade' => $req->cidade,
                            'estado' => $req->uf,
                            'cep' => $req->cep,
                            'observacao' => $req->obs
                        ]);

                    if ($insert > 0) {
                        $cad['success'] = true;
                        $cad['message'] = 'Fornecedor atualizado com sucesso.';
                        $cad['razao'] = $req->razao;
                        echo json_encode($cad);
                        // return;
                    } else {
                        $cad['success'] = false;
                    }
                } catch (Exception $e) {
                    DB::rollback();
                    $cad['success'] = false;
                    $cad['message'] = 'Erro no update do fornecedor. Se o erro continuar, contate o suporte.';
                    $cad['mlog'] = $e->getMessage();
                    echo json_encode($cad);
                    return;
                }
                DB::connection('mysql')->commit();
            } else {
                $cad['success'] = false;
                $cad['message'] = 'Não foi possível atualizar o fornecedor';
                echo json_encode($cad);
            }
        }
    }
    public function buscaIdByCnpj($cnpj)
    {
        $id = DB::table('fornecedors')
            ->select('id')
            ->where('cnpj', '=', $cnpj)
            ->first();

        return $id;
    }
}
