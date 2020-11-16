@extends('layouts.app', ['page' => __('Editar Fornecedor'), 'pageSlug' => 'fornecedores'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Editar Fornecedor <span style="color: rgba(0, 0, 0, 0.2);"> - {{ $data->fornecedor }}
                        #{{ $data->id }}</span> </span>
                {{-- <span class="title">Editar Fornecedor <span
                        style="color: rgba(0, 0, 0, 0.2);"> - {{ $data->fornecedor }} </span> <i
                        class="trash tim-icons icon-trash-simple"></i></span> --}}

                <div class="button-action">
                    <a href="{{ route('adm.fornecedores') }}">
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
                        <form name="formEditForn">
                            @csrf
                            <div class="subsecao">
                                <p>1. Dados de Cadastro</p>


                                <div class="form-row">
                                    <div class="left-row form-group">
                                        <label class="required" for="razao">Razão Social</label>
                                        <input value="{{ $data->fornecedor }}" class="form-control" type="text" id="razao"
                                            name="razao">
                                        <span id="error-razao" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row form-group">
                                        <label class="required" for="cnpj">CNPJ</label>
                                        <input value="{{ $data->cnpj }}" class="form-control" type="text" id="cnpj"
                                            name="cnpj" readonly="readonly" maxlength="18">
                                        <span id="error-cnpj" class="error-message d-none"></span>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="left-row form-group">
                                        <label class="required" for="fantasia">Fantasia</label>
                                        <input value="{{ $data->fantasia }}" class="form-control" type="text" id="fantasia"
                                            name="fantasia">
                                        <span id="error-fan" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row form-group">
                                        <label for="tel">Telefone</label>
                                        <input value="{{ $data->telefone }}" onkeypress="mask(this, mphone);"
                                            onblur="mask(this, mphone);" class="form-control" type="tel" id="tel"
                                            name="tel">
                                    </div>
                                </div>
                            </div>

                            <div class="subsecao">
                                <p>2. Endereço</p>
                                <div class="form-row">
                                    <div id="cep-row" class="form-group">

                                        <label for="cep">CEP</label>
                                        <input value="{{ $data->cep }}" class="form-control" type="text" id="cep"
                                            name="cep">
                                        <span id="error-cep" class="error-message d-none"></span>

                                    </div>

                                    <div style="margin-right:20px" class="form-group">
                                        <label for="logradouro">Logradouro</label>
                                        <input value="{{ $data->logradouro }}" class="form-control" type="text"
                                            id="logradouro" name="logradouro">
                                        <span id="error-logradouro" class="error-message d-none"></span>
                                    </div>

                                    <div style="width:100px" class="form-group">
                                        <label for="numero">nº</label>
                                        <input value="{{ $data->numero }}" class="form-control" type="text" id="numero"
                                            name="numero">
                                        <span id="error-numero" class="error-message d-none"></span>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div style="margin-right:20px" class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input value="{{ $data->bairro }}" class="form-control" type="text" id="bairro"
                                            name="bairro">
                                        <span id="error-bairro" class="error-message d-none"></span>
                                    </div>

                                    <div style="margin-right:20px" class="right-row form-group">
                                        <label for="cidade">Cidade</label>
                                        <input value="{{ $data->cidade }}" class="form-control" type="text" id="cidade"
                                            name="cidade">
                                        <span id="error-cidade" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row">
                                        <label for="uf">Estado</label>
                                        <select id="uf" class="form-control" name="uf">
                                            <option value=""></option>
                                            <option @if ($data->estado == 'AC') selected
                                                @endif value="AC">Acre</option>

                                            <option @if ($data->estado == 'AL') selected
                                                @endif value="AL">Alagoas</option>
                                            
                                            <option @if ($data->estado == 'AP') selected
                                                @endif value="AP">Amapá</option>

                                            <option @if ($data->estado == 'AM') selected
                                                @endif value="AM">Amazonas</option>

                                            <option @if ($data->estado == 'BA') selected
                                                @endif value="BA">Bahia</option>

                                            <option @if ($data->estado == 'CE') selected
                                                @endif value="CE">Ceará</option>

                                            <option @if ($data->estado == 'DF') selected
                                                @endif value="DF">Distrito Federal</option>

                                            <option @if ($data->estado == 'ES') selected
                                                @endif value="ES">Espírito Santo</option>

                                            <option @if ($data->estado == 'GO') selected
                                                @endif value="GO">Goiás</option>

                                            <option @if ($data->estado == 'MA') selected
                                                @endif value="MA">Maranhão</option>

                                            <option @if ($data->estado == 'MT') selected
                                                @endif value="MT">Mato Grosso</option>

                                            <option @if ($data->estado == 'MS') selected
                                                @endif value="MS">Mato Grosso do Sul</option>

                                            <option @if ($data->estado == 'MG') selected
                                                @endif value="MG">Minas Gerais</option>

                                            <option @if ($data->estado == 'PA') selected
                                                @endif value="PA">Pará</option>

                                            <option @if ($data->estado == 'PB') selected
                                                @endif value="PB">Paraíba</option>

                                            <option @if ($data->estado == 'PR') selected
                                                @endif value="PR">Paraná</option>

                                            <option @if ($data->estado == 'PE') selected
                                                @endif value="PE">Pernambuco</option>

                                            <option @if ($data->estado == 'PI') selected
                                                @endif value="PI">Piauí</option>

                                            <option @if ($data->estado == 'RJ') selected
                                                @endif value="RJ">Rio de Janeiro</option>

                                            <option @if ($data->estado == 'RN') selected
                                                @endif value="RN">Rio Grande do Norte</option>

                                            <option @if ($data->estado == 'RS') selected
                                                @endif value="RS">Rio Grande do Sul</option>

                                            <option @if ($data->estado == 'RO') selected
                                                @endif value="RO">Rondônia</option>

                                            <option @if ($data->estado == 'RR') selected
                                                @endif value="RR">Roraima</option>

                                            <option @if ($data->estado == 'SC') selected
                                                @endif value="SC">Santa Catarina</option>

                                            <option @if ($data->estado == 'SP') selected
                                                @endif value="SP">São Paulo</option>

                                            <option @if ($data->estado == 'SE') selected
                                                @endif value="SE">Sergipe</option>

                                            <option @if ($data->estado == 'TO') selected
                                                @endif value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="subsecao">
                                <p>3. Observações</p>

                                <div style="width:90%;" class="left-row form-group">
                                    <label for="razao">Se quiser, faça aqui uma observação.</label>
                                    <textarea style="max-width:90%;" class="form-control"
                                        type="text" id="obs" name="obs">{{ $data->observacao }}</textarea>
                                    <span id="error-obs" class="error-message d-none"></span>
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

    <script type="text/javascript">
        //Verifica se é celular ou telefone para aplicar a mascara
        var celOrTel = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-0000';
        };
        $('#tel').mask(celOrTel);

        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00', {
                reverse: true
            });
        });

        $(document).ready(function() {
            $('#cep').mask('00000-000', {
                reverse: true
            });
        });

        $(document).ready(function() {
            $("#searchForn").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableFornBody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    <script>
        $(function() {
            $('form[name="formEditForn"]').submit(function(event) {
                event.preventDefault();
                $flag = false;
                if (document.getElementById("razao").value == "") {
                    $("#razao").addClass("is-invalid");
                    $("#error-razao").removeClass("d-none");
                    $("#error-razao").html("Este campo não pode estar vazio.");
                    // document.getElementById("razao").focus();
                    $flag = true;
                } else {
                    $("#razao").removeClass("is-invalid");
                    $("#error-razao").addClass("d-none");
                }
                if (document.getElementById("fantasia").value == "") {
                    $("#fantasia").addClass("is-invalid");
                    $("#error-fan").removeClass("d-none");
                    $("#error-fan").html("Este campo não pode estar vazio.");
                    // document.getElementById("fantasia").focus();
                    $flag = true;
                } else {
                    $("#fantasia").removeClass("is-invalid");
                    $("#error-fan").addClass("d-none");
                }
                if (document.getElementById("cnpj").value == "") {
                    $("#cnpj").addClass("is-invalid");
                    $("#error-cnpj").removeClass("d-none");
                    $("#error-cnpj").html("Este campo não pode estar vazio.");
                    // document.getElementById("cnpj").focus();
                    $flag = true;
                } else {
                    $("#cnpj").removeClass("is-invalid");
                    $("#error-cnpj").addClass("d-none");
                }
                if ($flag === true) {
                    return false
                }

                $.ajax({
                    url: "{{ route('update.fornecedor') }}",
                    type: "put",
                    data: $(this)
                        .serialize(), // .serialize vai pegar todos os campos e formatar e ja devolver certinho
                    dataType: 'json', //tipo de retorno que estamos aguardando
                    success: function(
                        response) { // o que for respondido pela rota vai estar no response
                        if (response.success === true) {
                            // window.location.href="{{ route('adm.fornecedores') }}"
                            $message = response.razao + " - " + response.message;
                            $status = 'success'
                            demo.showNotification($status, $message, 'bottom', 'right');

                        } else {
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
