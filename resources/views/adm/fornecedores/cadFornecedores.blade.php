@extends('layouts.app', ['page' => __('Cadastrar Fornecedor'), 'pageSlug' => 'fornecedores'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Cadastrar Fornecedor</span>
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
                        <form name="formCadForn">
                            @csrf
                            <div class="subsecao">
                                <p>1. Dados de Cadastro</p>


                                <div class="form-row">
                                    <div class="left-row form-group">
                                        <label class="required" for="razao">Razão Social</label>
                                        <input class="form-control" type="text" id="razao" name="razao">
                                        <span id="error-razao" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row form-group">
                                        <label class="required" for="cnpj">CNPJ</label>
                                        <input class="form-control" type="text" id="cnpj" name="cnpj" maxlength="18">
                                        <span id="error-cnpj" class="error-message d-none"></span>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="left-row form-group">
                                        <label class="required" for="fantasia">Fantasia</label>
                                        <input class="form-control" type="text" id="fantasia" name="fantasia">
                                        <span id="error-fan" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row form-group">
                                        <label for="tel">Telefone</label>
                                        <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"
                                            class="form-control" type="tel" id="tel" name="tel">
                                    </div>
                                </div>
                            </div>

                            <div class="subsecao">
                                <p>2. Endereço</p>
                                <div class="form-row">
                                    <div id="cep-row" class="form-group">

                                        <label for="cep">CEP</label>
                                        <input class="form-control" type="text" id="cep" name="cep">
                                        <span id="error-cep" class="error-message d-none"></span>

                                    </div>

                                    <div style="margin-right:20px" class="form-group">
                                        <label for="logradouro">Logradouro</label>
                                        <input class="form-control" type="text" id="logradouro" name="logradouro">
                                        <span id="error-logradouro" class="error-message d-none"></span>
                                    </div>

                                    <div style="width:100px" class="form-group">
                                        <label for="numero">nº</label>
                                        <input class="form-control" type="text" id="numero" name="numero">
                                        <span id="error-numero" class="error-message d-none"></span>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div style="margin-right:20px" class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input class="form-control" type="text" id="bairro" name="bairro">
                                        <span id="error-bairro" class="error-message d-none"></span>
                                    </div>

                                    <div style="margin-right:20px" class="right-row form-group">
                                        <label for="cidade">Cidade</label>
                                        <input class="form-control" type="text" id="cidade" name="cidade">
                                        <span id="error-cidade" class="error-message d-none"></span>
                                    </div>

                                    <div class="right-row">
                                        <label for="uf">Estado</label>
                                        <select id="uf" class="form-control" name="uf">
                                            <option value=""></option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="subsecao">
                                <p>3. Observações</p>

                                <div style="width:90%;" class="left-row form-group">
                                    <label for="razao">Se quiser, faça aqui uma observação.</label>
                                    <textarea style="max-width:90%;" class="form-control" type="text" id="obs"
                                        name="obs"></textarea>
                                    <span id="error-obs" class="error-message d-none"></span>
                                </div>

                            </div>
                            <div class="btn-container-form">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-------------------- Scripts ----------------------->

    <script>
        // <!-------------- Mascara CNPJ --------------->
        $(document).ready(function() {
            $("#cnpj").mask("99.999.999/9999-99");
        });

        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        // <!-------------- Mascara TELEFONE --------------->
        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }

        // <!-------------- Mascara CEP --------------->
        $(document).ready(function() {
            $("#cep").mask("99999-999");
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

    <!-- Validação se o campo esta vazio, se os dados ja estao cadastrados e ajax -->
    <script>
        document.getElementById("razao").focus();
        $(function() {
            $('form[name="formCadForn"]').submit(function(event) {
                event.preventDefault();
                $flag = false;
                if (document.getElementById("razao").value == "") {
                    $("#razao").addClass("is-invalid");
                    $("#error-razao").removeClass("d-none");
                    // $("#error-razao").html("Este campo não pode estar vazio.");
                    // document.getElementById("razao").focus();
                    $flag = true;
                } else {
                    $("#razao").removeClass("is-invalid");
                    $("#error-razao").addClass("d-none");
                }
                if (document.getElementById("fantasia").value == "") {
                    $("#fantasia").addClass("is-invalid");
                    $("#error-fan").removeClass("d-none");
                    // $("#error-fan").html("Este campo não pode estar vazio.");
                    // document.getElementById("fantasia").focus();
                    $flag = true;
                } else {
                    $("#fantasia").removeClass("is-invalid");
                    $("#error-fan").addClass("d-none");
                }
                if (document.getElementById("cnpj").value == "") {
                    $("#cnpj").addClass("is-invalid");
                    $("#error-cnpj").removeClass("d-none");
                    // $("#error-cnpj").html("Este campo não pode estar vazio.");
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
                    url: "{{ route('cadastro.fornecedor') }}",
                    type: "post",
                    data: $(this)
                        .serialize(), // .serialize vai pegar todos os campos e formatar e ja devolver certinho
                    dataType: 'json', //tipo de retorno que estamos aguardando
                    success: function(
                        response) { // o que for respondido pela rota vai estar no response
                        if (response.success === true) {
                            $status = 'success'
                            $message = response.razao + " - " + response.message;
                            demo.showNotification($status, $message, 'bottom', 'right');
                            document.getElementById('razao').value = '';
                            document.getElementById('fantasia').value = '';
                            document.getElementById('cnpj').value = '';
                            document.getElementById('tel').value = '';
                            document.getElementById('cep').value = '';
                            document.getElementById('logradouro').value = '';
                            document.getElementById('bairro').value = '';
                            document.getElementById('numero').value = '';
                            document.getElementById('uf').value = '';
                            document.getElementById('cidade').value = '';
                            document.getElementById('obs').value = '';
                        } else {
                            if (response.existeCNPJ == true) {
                                $("#error-cnpj").html("CNPJ já cadastrado");
                                $("#cnpj").addClass("is-invalid");
                                $("#error-cnpj").removeClass("d-none");
                            }
                            if (response.existeRazao == true) {
                                $("#error-razao").html("Razão Social já cadastrado");
                                $("#razao").addClass("is-invalid");
                                $("#error-razao").removeClass("d-none");
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
