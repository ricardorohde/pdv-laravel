@extends('layouts.app', ['page' => __('ProdutoEditById'), 'pageSlug' => 'produtosEdit'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Editar Produto <span style="color: rgba(0, 0, 0, 0.2);"> - {{ $prod->nome }}
                    # {{ $prod->codigo }}</span> </span>
                <div class="button-action">
                    <a href="{{ route('adm.produtos') }}">
                        <button type="button" class="btn btn-outline-danger">Cancelar</button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                </div>
                <div style="padding: 40px;" class="card-body">

                    {{-- <form action="{{ route('cadastro.fornecedor') }}" method="post"
                        name="formCadForn"> --}}
                        <form name="formEditProd">
                            @csrf
                            <div class="subsecao">
                                <p>1. Informações</p>

                                <div class="form-row form-resp">
                                    <div style="width:200px" class="form-group">
                                        <label class="required" for="cod">Código</label>
                                        <input class="form-control" type="text" id="cod" name="cod"
                                            value="{{ $prod->codigo }}" readonly="readonly">
                                        <span id="error-cod" class="error-message d-none"></span>
                                    </div>

                                    <div style="min-width:400px; width:60%; max-width:600px;" class="form-group">
                                        <label class="required" for="nome">Nome</label>
                                        <input class="form-control" type="text" id="nome" name="nome"
                                            value="{{ $prod->nome }}">
                                        <span id=" error-nome" class="error-message d-none"></span>
                                    </div>

                                    <div style="width:auto;">
                                        <label class="required" for="categoria">Categoria</label>
                                        <select id="categoria" class="form-control" name="categoria">
                                            <option value="{{ $prod->categoria }}">{{ $prod->categoria }}</option>
                                            @foreach ($cat as $i)
                                                @if ($prod->categoria !== $i->categoria)
                                                    <option value="{{ $i->categoria }}">{{ $i->categoria }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div style="width:auto;">
                                        <label class="required" for="marca">Marca</label>
                                        <select id="marca" class="form-control" name="marca">
                                            <option value="{{ $prod->marca }}">{{ $prod->marca }}</option>
                                            @foreach ($marca as $i)
                                                @if ($prod->marca !== $i->marca)
                                                    <option value="{{ $i->marca }}">{{ $i->marca }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div style="width:auto;">
                                        <label class="required" for="fornecedor">Fornecedor</label>
                                        <select id="fornecedor" class="form-control" name="fornecedor">
                                            <option value="{{ $prod->fornecedor }}">{{ $prod->fornecedor }}</option>
                                            @foreach ($forn as $i)
                                                @if ($prod->fornecedor !== $i->fornecedor)
                                                    <option value="{{ $i->fornecedor }}">{{ $i->fornecedor }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="subsecao">
                                <p>2. Atributos</p>

                                <div class="form-row form-resp">

                                    @if ($config['ATRIBUTE_TECIDO'] === 's')
                                        <!-- Fazer verificação de acordo com o status da config no banco de dados -->
                                        <div style="width:auto;">
                                            <label class="required" for="tecido">Tecido</label>
                                            <select id="tecido" class="form-control" name="tecido">
                                                <option value="{{ $prod->tecido }}">{{ $prod->tecido }}</option>
                                                @foreach ($tecido as $i)
                                                    @if ($prod->tecido !== $i->tecido)
                                                        <option value="{{ $i->tecido }}">{{ $i->tecido }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div style="width:auto;">
                                        <label class="required" for="unidade">Unidade</label>
                                        <select id="unidade" class="form-control" name="unidade">
                                            <option value="{{ $prod->unidade }}">{{ $prod->unidade }}</option>
                                            @foreach ($unidade as $i)
                                                @if ($prod->unidade !== $i->unidade)
                                                    <option value="{{ $i->unidade }}">{{ $i->unidade }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($config['ATRIBUTE_COR'] === 's')
                                        <div style="width:auto;">
                                            <label class="required" for="cor">Cor</label>
                                            <select id="cor" class="form-control" name="cor">
                                                <option value=""></option>
                                                @foreach ($cor as $i)
                                                    <option value="{{ $i->cor }}">{{ $i->cor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if ($config['ATRIBUTE_TAMANHO'] === 's')
                                        <div style="width:auto;">
                                            <label class="required" for="tamanho">Tamanho</label>
                                            <select id="tamanho" class="form-control" name="tamanho">
                                                <option value=""></option>
                                                @foreach ($tam as $i)
                                                    <option value="{{ $i->tamanho }}">{{ $i->tamanho }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="subsecao">
                                <p>3. Descrição</p>

                                <div class="form-row form-resp">
                                    <div style="width:90%;" class="left-row form-group">
                                        <label for="descricao">Faça uma breve descrição do produto.</label>
                                        <textarea style="max-width:90%;" class="form-control" type="text" id="descricao"
                                            name="descricao">{{ $prod->descricao }}</textarea>
                                        <span id="error-descricao" class="error-message d-none"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="btn-container-form">
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-------------------- Scripts ----------------------->
    <!-- Validação se o campo esta vazio, se os dados ja estao cadastrados e ajax -->
    {{-- <script>
        $(document).ready(function() {
            /**
             * valida o codigo de barras do produto (EAN/GTIN)
             */
            $('body').on('change', '#cod', function() {
                // pega o codigo de barras (EAN/GTIN)
                let codigo = this.value || '';

                // verifica se o código existe e é um número
                if (codigo.length > 0 && !isNaN(codigo)) {
                    // completa o código de barras com 18 chars
                    let num = codigo.padStart(18, 0);
                    // pega o dígito verificador
                    let dv = parseInt(num.charAt(17));
                    // pega o código de barras excluíndo o dígito verificador
                    num = num.substring(0, 17);

                    // realiza o calculo do dígito verificador
                    let sum = 0;
                    num.split('').forEach(function(value) {
                        // faz a soma dos dígitos do código
                        sum += (factor * value);
                        // atualiza o fator de multiplicação
                        factor = factor == 3 ? 1 : 3;
                    }, factor = 3);

                    // realiza o calculo do dígito verificador
                    let mmc = (Math.ceil(sum / 10)) * 10;
                    mod = parseInt(mmc - sum);

                    // valida se o dígito verificador informado
                    // é igual ao dígito verificador calculado
                    if (dv != mod) {
                        alert(
                            'O código de barras digitado não é válído. Por favor, verique os dados informados.'
                        );
                    }
                }
            });
        });

    </script> --}}
    <script>
        $(function() {
            $('form[name="formEditProd"]').submit(function(event) {
                event.preventDefault();
                $flag = false;
                if (document.getElementById("cod").value == "") {
                    $("#cod").addClass("is-invalid");
                    $("#error-cod").removeClass("d-none");
                    // document.getElementById("razao").focus();
                    $flag = true;
                } else {
                    $("#cod").removeClass("is-invalid");
                    $("#error-cod").addClass("d-none");
                }
                if (document.getElementById("nome").value == "") {
                    $("#nome").addClass("is-invalid");
                    $("#error-nome").removeClass("d-none");
                    // document.getElementById("fantasia").focus();
                    $flag = true;
                } else {
                    $("#nome").removeClass("is-invalid");
                    $("#error-nome").addClass("d-none");
                }
                if (document.getElementById("categoria").value == "") {
                    $("#categoria").addClass("is-invalid");
                    $("#error-categoria").removeClass("d-none");
                    // document.getElementById("cnpj").focus();
                    $flag = true;
                } else {
                    $("#categoria").removeClass("is-invalid");
                    $("#error-categoria").addClass("d-none");
                }
                if (document.getElementById("marca").value == "") {
                    $("#marca").addClass("is-invalid");
                    $("#error-marca").removeClass("d-none");
                    // document.getElementById("razao").focus();
                    $flag = true;
                } else {
                    $("#marca").removeClass("is-invalid");
                    $("#error-marca").addClass("d-none");
                }
                if (document.getElementById("fornecedor").value == "") {
                    $("#fornecedor").addClass("is-invalid");
                    $("#error-fornecedor").removeClass("d-none");
                    // document.getElementById("fantasia").focus();
                    $flag = true;
                } else {
                    $("#fornecedor").removeClass("is-invalid");
                    $("#error-fornecedor").addClass("d-none");
                }
                if (document.getElementById("unidade").value == "") {
                    $("#unidade").addClass("is-invalid");
                    $("#error-unidade").removeClass("d-none");
                    // document.getElementById("razao").focus();
                    $flag = true;
                } else {
                    $("#unidade").removeClass("is-invalid");
                    $("#error-unidade").addClass("d-none");
                }
                if ($flag === true) {
                    return false
                }

                $.ajax({
                    url: "{{ route('adm.produtos.updateProduto') }}",
                    type: "put",
                    data: $(this)
                        .serialize(), // .serialize vai pegar todos os campos e formatar e ja devolver certinho
                    dataType: 'json', //tipo de retorno que estamos aguardando
                    success: function(
                        response) { // o que for respondido pela rota vai estar no response
                        if (response.success === true) {
                            $status = 'success'
                            $message = response.nome + " - " + response.message;
                            demo.showNotification($status, $message, 'bottom', 'right');
                            // document.getElementById('cod').value = '';
                            // document.getElementById('nome').value = '';
                            // document.getElementById('categoria').value = '';
                            // document.getElementById('marca').value = '';
                            // document.getElementById('fornecedor').value = '';
                            // document.getElementById('unidade').value = '';
                            // document.getElementById('descricao').value = '';
                        } else {
                            if (response.existeCod == true) {
                                $("#error-cod").html("Código já cadastrado");
                                $("#cod").addClass("is-invalid");
                                $("#error-cod").removeClass("d-none");
                            }
                            if (response.existeNome == true) {
                                $("#error-nome").html("Nome de Produto já cadastrado");
                                $("#nome").addClass("is-invalid");
                                $("#error-nome").removeClass("d-none");
                            }
                            $status = 'error'
                            $message = response.message;
                            demo.showNotification($status, $message, 'bottom', 'right');
                        }
                        console.log(response);
                    }
                });

            });
        });

    </script>
@endsection
