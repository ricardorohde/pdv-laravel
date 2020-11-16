<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ConfigController extends Controller
{
    /*--------------- PAGES -------------*/
    /**
     * @return \Illuminate\View\View
     */
    public function pageConfig()
    {
        $data = $this->selectUnidade();
        // echo json_encode($data);
        // dd();
        return view('config.empresa', compact('data'));
    }

    public function updateConfig(Request $req)
    {
        $request = $req->input('input_config');
        // $flag = false;
        // $cad['debug'] = $req->input('input_config');
        // $cad['debug'] = $request;
        // echo json_encode($cad);
        // dd();
        // return;

        /* Verifica se tem algum campo vazio */
        if (is_null($request)) {
            $cad['success'] = false;
            $cad['empty'] = true;
            $cad['message'] = 'É necessário pelo menos uma unidade';
            echo json_encode($cad);
            return;
        }

        try {
            DB::connection('mysql')->beginTransaction();

            $updateDelete = DB::table('unidades')
                ->update([
                    'status' => 0,
                ]);

            foreach ($request as  $d) {
                $update = DB::table('unidades')
                    ->where('unidade', '=', $d)
                    ->update([
                        'status' => 1,
                    ]);
            }
            if ($update > 0) {
                $cad['success'] = true;
                $cad['message'] = 'Atualizado com sucesso.';
                $cad['nome'] = $req->nome;
                echo json_encode($cad);
                // return;
            } else {
                $cad['success'] = false;
            }
        } catch (Exception $e) {
            DB::rollback();
            $cad['success'] = false;
            $cad['message'] = 'Erro ao salvar. Se o erro continuar, contate o suporte.';
            $cad['mlog'] = $e->getMessage();
            echo json_encode($cad);
            return;
        }
        DB::connection('mysql')->commit();
    }

    public function selectUnidade()
    {
        $marca = DB::table('unidades')
            ->select('unidade', 'status')
            // ->where('status', '=', '1')
            ->get();
        return $marca;
    }
}
