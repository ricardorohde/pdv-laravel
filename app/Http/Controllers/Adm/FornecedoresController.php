<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedoresController extends Controller
{
    public function insertFornecedor(Request $req){
        $flag = false;
        
        if(is_null($req->razao) || is_null($req->fantasia) || is_null($req->cnpj)) {
            echo json_encode('Preencha todos os campos necessários');
            return;
        }

        if(DB::connection('mysql')->table('fornecedors')->where('fornecedor', $req->razao)->exists() ){
            $cad['existeRazao'] = true;
            $flag = true;
        }

        $req->cnpj = preg_replace('/[^0-9]/','',$req->cnpj);
        if(DB::connection('mysql')->table('fornecedors')->where('cnpj', $req->cnpj)->exists() ){
            $cad['existeCNPJ'] = true;
            $flag = true;
        }       
        
        if ($flag == false){

            try{
                DB::connection('mysql')->beginTransaction();
                
                DB::table('fornecedors')->insert(
                    ['fornecedor'=>$req->razao,
                    'fantasia'=>$req->fantasia,
                    'cnpj'=>$req->cnpj,
                    'telefone'=>$req->tel]
                );  
                DB::connection('mysql')->commit();
                $cad['success'] = true;
                $cad['message'] = 'Fornecedor cadastrado com sucesso.';
                $cad['razao'] = $req->razao;
                echo json_encode($cad);
                // return;
            }
            
            catch(ServerException $e){
                $cad['success'] = false;
                $cad['message'] = $e;
                echo json_encode($cad);
                // return;
            }

        }else{
            $cad['success'] = false;
            $cad['message'] = 'Não foi possível cadastrar o fornecedor';
            echo json_encode($cad);
        }
}
}