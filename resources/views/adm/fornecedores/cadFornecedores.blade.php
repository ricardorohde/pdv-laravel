@extends('layouts.app', ['page' => __('Cadastrar Fornecedor'), 'pageSlug' => 'fornecedores'])

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="container-title">
            <span class="title">Meus Fornecedores</span>
            <div class="button-action">
            <a href="{{ route('adm.fornecedores')  }}">
                <button type="button" class="btn btn-outline-danger">Cancelar</button>
            </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> 
            </div>
        <div class="card-body">
            
            {{-- <form action="{{ route('cadastro.fornecedor')  }}" method="post" name="formCadForn"> --}}
            <form name="formCadForn">
                @csrf
                <div class="form-group">
                    <label class="required" for="razao">Razão Social</label><br>
                    <input class="form-control" type="text" id="razao" name="razao">
                    <span id="error-razao" class="error-message d-none"></span><br>
                    
                </div>

                <div class="form-group">
                    <label class="required" for="fantasia">Apelido/Fantasia:</label><br>
                    <input class="form-control"  type="text"  id="fantasia" name="fantasia">
                    <span id="error-fan" class="error-message d-none"></span><br>
                </div>

                <div class="form-group">
                    <label class="required" for="cnpj">CNPJ:</label><br>
                    <input class="form-control"  type="text" id="cnpj" name="cnpj" maxlength="18">
                    <span id="error-cnpj" class="error-message d-none"></span><br>
                </div>

                <div class="form-group">
                    <label for="tel">Telefone:</label><br>
                    <input class="form-control"  type="tel" id="tel" name="tel"><br>
                </div>
                <div class="btn-container-form">
                    <button class="btn btn-primary" type="submit">Cadastrar</button> 
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
    
    <!-- Imports CDN -->    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> 
    
    <!-- Scripts -->
    <script>
        document.getElementById('cnpj').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
        });
    </script>
    <script>
        $(function(){
            $('form[name="formCadForn"]').submit(function(event){
                // 
                event.preventDefault();
                $flag = false;
                if(document.getElementById("razao").value == ""){
                    $("#razao").addClass("is-invalid");
                    $("#error-razao").removeClass("d-none");
                    $("#error-razao").html("Este campo não pode estar vazio.");
                    // document.getElementById("razao").focus();
                    $flag = true;
                }else{
                    $("#razao").removeClass("is-invalid");
                    $("#error-razao").addClass("d-none");
                }
                if(document.getElementById("fantasia").value == ""){
                    $("#fantasia").addClass("is-invalid");
                    $("#error-fan").removeClass("d-none");
                    $("#error-fan").html("Este campo não pode estar vazio.");
                    // document.getElementById("fantasia").focus();
                    $flag = true;
                }else{
                    $("#fantasia").removeClass("is-invalid");
                    $("#error-fan").addClass("d-none");
                }
                if(document.getElementById("cnpj").value == ""){
                    $("#cnpj").addClass("is-invalid");
                    $("#error-cnpj").removeClass("d-none");
                    $("#error-cnpj").html("Este campo não pode estar vazio.");
                    // document.getElementById("cnpj").focus();
                    $flag = true;
                }else{
                    $("#cnpj").removeClass("is-invalid");
                    $("#error-cnpj").addClass("d-none");
                }
                if($flag === true){
                    return false
                }
                
                $.ajax({
                    url:"{{ route('cadastro.fornecedor')  }}",
                    type: "post",
                    data: $(this).serialize(), // .serialize vai pegar todos os campos e formatar e ja devolver certinho
                    dataType: 'json', //tipo de retorno que estamos aguardando
                    success: function(response){ // o que for respondido pela rota vai estar no response
                        if(response.success === true){
                            $message = response.razao + " - " + response.message;
                            demo.showNotification($message,'bottom','right');
                            document.getElementById('razao').value=''; 
                            document.getElementById('fantasia').value=''; 
                            document.getElementById('cnpj').value=''; 
                            document.getElementById('tel').value=''; 
                        }else{
                            if(response.existeCNPJ == true){
                                $("#error-cnpj").html("CNPJ já cadastrado");
                                $("#cnpj").addClass("is-invalid");
                                $("#error-cnpj").removeClass("d-none");
                            }
                            if(response.existeRazao == true){
                                $("#error-razao").html("Razão Social já cadastrado");
                                $("#razao").addClass("is-invalid");
                                $("#error-razao").removeClass("d-none");
                            }
                        } 
                    }
                });                     
            });
        });
    </script>
@endsection
