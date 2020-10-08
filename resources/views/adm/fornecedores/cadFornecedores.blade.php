@extends('layouts.app', ['page' => __('Cadastrar Fornecedor'), 'pageSlug' => 'fornecedores'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="container-title">
        <span class="title">Meus Fornecedores</span>
        <div class="button-action">
          <a href="{{ route('adm.fornecedores')  }}">
            <button type="button" class="btn btn-danger">Cancelar</button>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-header"> 
        </div>
      <div class="card-body">
        <form action="" method="post"></form>
      </div>
      </div>
    </div>
  </div>
@endsection
{{-- linear-gradient(180deg, rgba(47,47,212,1) 0%, rgba(46,88,235,1) 100%); --}}