@extends('layouts.app', ['page' => __('Entrada Estoque'), 'pageSlug' => 'estoqueEntrada'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Entrada de Estoque</span>
                <div class="button-action">
                    <a href="{{ route('adm.estoque') }}">
                        <button type="button" class="btn btn-outline-danger">Cancelar</button>
                    </a>
                </div>
            </div>
            {{-- @include('adm.estoque.components.buscaProdCod')
            --}}
            {{-- <a href="#">
                <div id="add-button-estoque">
                    <svg xmlns="http://www.iw3.org/2000/svg" viewBox="0 0 24 24" fill="#d6d8e2" width="35px" height="35px">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                    </svg>
                </div>
            </a> --}}

            <div class="card">
                <div class="card-header">
                </div>
                <div style="padding: 40px;" class="card-body">

                    <form name="formEstoqueEntrada">
                        @csrf
                        <div class="subsecao">
                            <p>1. Qual é o produto?</p>

                            <div class="form-row form-resp">
                                <div style="width:200px" class="form-group">
                                    <label class="required" for="cod">Código</label>
                                    <input class="form-control" type="text" id="cod" name="cod" onclick="clean()">
                                    <span id="error-cod" class="error-message d-none"></span>
                                </div>

                                <div style="min-width:400px; width:60%; max-width:600px;" class="form-group">
                                    <label class="required" for="nome">Nome</label>
                                    <input class="form-control" type="text" id="nome" name="nome" readonly>
                                    <span id="error-nome" class="error-message d-none"></span>
                                </div>

                            </div>
                        </div>
                        <div class="subsecao">
                            <p>2. Fornecedor</p>
                            <div class="form-row form-resp">

                                {{-- <div style="width:150px" class="form-group">
                                    <label class="required" for="cnpj">CNPJ</label>
                                    <input class="form-control" type="number" id="cnpj" name="cnpj" min="0">
                                    <span id="error-cnpj" class="error-message d-none"></span>
                                </div> --}}

                                <div style="width:auto;">
                                    <label class="required" for="fornecedor">Fornecedor</label>
                                    <select id="fornecedor" class="form-control" name="fornecedor">
                                        <option value=""></option>
                                        @foreach ($data as $i)
                                            <option value="{{ $i->fornecedor }}">{{ $i->fornecedor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="subsecao">
                            <p>3. Financeiro</p>

                            <div class="form-row form-resp">
                                <div style="width:150px" class="form-group">
                                    <label class="required" for="preco-custo">Preço de Custo</label>
                                    <input class="form-control" type="number" id="preco-custo" name="preco-custo" min="0">
                                    <span id="error-preco-custo" class="error-message d-none"></span>
                                </div>

                                <div style="width:180px;" class="form-group">
                                    <label class="required" for="type-margem">Margem de Lucro</label>
                                    <div class="flex-center">
                                        <select style="width: auto; background:	#F5F5F5;border-radius: 0.25rem 0 0 0.25rem;"
                                            id="type-margem" class="form-control" name="type-margem">
                                            <option value="percent">%</option>
                                            <option value="real">R$</option>
                                        </select>
                                        <input style="border-radius:0 0.25rem 0.25rem 0;" class="form-control" type="number"
                                            id="margem" name="margem" min="0">
                                        <span id="error-margem" class="error-message d-none"></span>
                                    </div>
                                </div>

                                <div style="width:150px" class="form-group">
                                    <label class="required" for="preco-venda">Preço de Venda</label>
                                    <input class="form-control" type="number" id="preco-venda" name="preco-venda">
                                    <span id="error-preco-venda" class="error-message d-none"></span>
                                </div>

                                <div style="width:100px" class="form-group">
                                    <label for="lucro-prod">Lucro Real</label>
                                    <input class="form-control" type="text" id="lucro-prod" name="lucro-prod"
                                        readonly="readonly">
                                    <span id="error-lucro-prod" class="error-message d-none"></span>
                                </div>
                            </div>
                        </div>
                        <div class="subsecao">
                            <p>4. Estoque</p>
                            <div class="form-row form-resp">

                                <div class="form-row form-resp">
                                    <div style="width:150px" class="form-group">
                                        <label class="required" for="qtd">Qtd. Entrada</label>
                                        <input class="form-control" type="number" id="qtd" name="qtd" min="0">
                                        <span id="error-qtd" class="error-message d-none"></span>
                                    </div>
                                </div>
                                <div class="form-row form-resp">
                                    <div style="width:150px" class="form-group">
                                        <label for="estoque-novo">Qtd. Atualizada</label>
                                        <input class="form-control" type="text" id="estoque-novo" name="estoque-novo"
                                            readonly="readonly">
                                        <span id="error-estoque-novo" class="error-message d-none"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-------------------- Scripts ----------------------->

    {{--
    //Aqui a ativa a imagem de load
    function loading_show(){
    $('#loading').html("<img src='img/loading.gif' />").fadeIn('fast');
    }

    //Aqui desativa a imagem de loading
    function loading_hide(){
    $('#loading').fadeOut('fast');
    } --}}
    <!-- Validação se o campo esta vazio, se os dados ja estao cadastrados e ajax  0.25rem 0px 0px 0.25rem -->
    <script>
        function clean() {
            document.getElementById('nome').value = '';
            $("#fornecedor").val('').change();
            document.getElementById('preco-custo').value = '';
            document.getElementById('preco-venda').value = '';
            document.getElementById('lucro-prod').value = '';
            document.getElementById('estoque-novo').value = '';
        };
        $(document).ready(function() {
            $('#preco-custo').mask('000.000.000,00', {
                reverse: true
            });
            $('#preco-venda').mask('000.000.000,00', {
                reverse: true
            });
            $('#lucro-prod').mask('000.000.000,00', {
                reverse: true
            });

            $(function() {
                $('#cod').blur(function(event) {
                    var cod = $('#cod').val();
                    // console.log(cod) 
                    $.ajax({
                        type: "POST",
                        url: "buscaProd/byCod",
                        data: {
                            cod,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(
                        response) { // o que for respondido pela rota vai estar no response
                            if (response.successSelect === true) {
                                document.getElementById('cod').value = response.codigo;
                                document.getElementById('nome').value = response.nome;
                                document.getElementById('preco-custo').value = response
                                    .preco_custo;
                                document.getElementById('preco-venda').value = response
                                    .preco;
                                document.getElementById('lucro-prod').value = response
                                    .lucro;
                                document.getElementById('estoque-novo').value = response
                                    .estoque;
                                $("#fornecedor").val(response.fornecedor).change();
                                $("#cod").removeClass("is-invalid");
                                $("#error-cod").addClass("d-none");

                            } else {
                                $message = response.message;
                                $("#error-cod").html($message);
                                $("#cod").addClass("is-invalid");
                                $("#error-cod").removeClass("d-none");

                            }
                            console.log(response);
                        }
                    });
                });
            });
        });

    </script>
@endsection
