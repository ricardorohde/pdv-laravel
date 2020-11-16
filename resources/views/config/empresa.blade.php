@extends('layouts.app', ['page' => __('Config'), 'pageSlug' => 'configEmpresa'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Configurações</span>
            </div>

            <div class="container-subtitle"></div>

            <div class="card">
                <div class="card-header"></div>

                <div class="card-body" style="padding: 40px;">

                    <form name="formConfigUpdate">
                        @csrf
                        <div class="subsecao" style="padding-bottom:20px; border-bottom: solid 1px #d9d8d8">
                            <div>
                                <h3 style="margin: 0 0 20px 0; color:#535353">Unidades</h3>
                                <h5 style="color: rgba(0, 0, 0, 0.6);">
                                    Escolha as Unidades de medidas do produto que estarão disponíveis no cadastro de
                                    produtos
                                </h5>
                            </div>
                            @foreach ($data as $d)
                                <div class="form-check form-check-inline">
                                    <input name="input_config[]" class="form-check-input" type="checkbox"
                                        id="un{{ $d->unidade }}" value="{{ $d->unidade }}" @if ($d->status === '1') checked
                            @endif>
                            <label class="form-check-label" for="un{{ $d->unidade }}">{{ $d->unidade }}</label>
                        </div>
                        @endforeach
                </div>
                <div class="btn-container-form">
                    <button id="btn-salvar" class="btn btn-primary" type="submit">Salvar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>


    <!-------------------- Scripts ----------------------->
    <script type="text/javascript">
        $(function() {
            $('form[name="formConfigUpdate"]').submit(function(event) {
                event.preventDefault();
                $flag = false;

                $.ajax({
                    url: "{{ route('config.empresa.update') }}",
                    type: "put",
                    data: $(this)
                        .serialize(), // .serialize vai pegar todos os campos e formatar e ja devolver certinho
                    dataType: 'json', //tipo de retorno que estamos aguardando
                    success: function(
                        response
                    ) { // o que for respondido pela rota vai estar no response
                        if (response.success === true) {
                            $(".subsecao").removeClass("error-config");
                            document.getElementById("btn-salvar").disabled = true;
                            setTimeout(function() {
                                document.getElementById("btn-salvar").disabled = false;
                            }, 5000);

                            $status = 'success'
                            $message = response.message;
                            demo.showNotification($status, $message, 'bottom', 'right');
                        } else {
                            $status = 'error'
                            $message = response.message;
                            demo.showNotification($status, $message, 'bottom', 'right');
                            if (response.empty === true) {
                                $(".subsecao").addClass("error-config");

                            } else {
                                $(".subsecao").removeClass("error-config");
                            }

                        }
                        console.log(response);
                    }
                });

            });
        });

    </script>
@endsection
