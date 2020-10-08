{{-- @extends('layouts.app', ['activePage' => 'financeiro', 'titlePage' => __('Financeiro'), 'pageSlug' => 'financeiro']) --}}
@extends('layouts.app', ['page' => __('Financeiro'), 'pageSlug' => 'financeiro'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div style="min-height: 20vh" class="card">
        <div class="card-header">
          Meu Financeiro
          {{-- <h5 class="title">Cadastro de produtos</h5>
          <p class="category">Handcrafted by our friends from
            <a href="https://nucleoapp.com/?ref=1712">NucleoApp</a>
          </p> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
