<?php

namespace App\Http\Controllers;

class PageController extends Controller
{   
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function  cadFornecedores()
    {
        return view('adm.fornecedores.cadFornecedores');
    }

    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function  produtosCadastro()
    {
        return view('adm.produtos.produtos-cadastro');
    }

    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function  produtosExcluir()
    {
        return view('adm.produtos.produtos-excluir');
    }


    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function fornecedores()
    {
        return view('adm.fornecedores');
    }
   
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function financeiro()
    {
        return view('adm.financeiro');
    }

      /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function estoque()
    {
        return view('adm.estoque');
    }

    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
