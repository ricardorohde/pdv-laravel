@extends('layouts.app', ['page' => __('Editar Produtos'), 'pageSlug' => 'produtosEdit'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Meus Produtos</span>
            </div>

            <div class="container-subtitle">

                <div class="container-search">
                    {{-- <i class="search-icon tim-icons icon-zoom-split"></i>
                    --}}
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6c757d"
                        width="25px" height="25px">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    <input class="input-search" id="searchProd" type="text" placeholder="Pesquisar Produto">
                </div>

                {{-- <div class="container-filter">
                    <div>
                        <span>Filtrar: </span>
                    </div>
                    <ul id="filters">
                        @foreach ($data as $d)
                            <li>
                                <input type="checkbox" value="{{ $d->categoria }}" id="filter-{{ $d->id }}" />
                                <label for="filter-{{ $d->id }}">{{ $d->categoria }}</label>
                            </li>
                        @endforeach

                    </ul>
                </div> --}}
                <div class="button-action">
                    <a href="{{ route('adm.produtos.produtos-cadastro') }}" ">
                    <button type=" button" class="btn btn-primary">Novo Produto</button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    {{-- <p>{{ $data }}</p> --}}
                    <table id="tableProd" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                {{-- <th scope="col">Fantasia</th>
                                --}}
                                <th scope="col">Código</th>
                                <th scope="col">Categoria</th>
                            </tr>
                        </thead>
                        <tbody id="tableProdBody">
                            @foreach ($data as $d)
                                <tr style="cursor: pointer;" onclick="location.href = 'produto/edit/{{ $d->id }}'">
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->nome }}</td>
                                    {{-- <td>{{ $d->fantasia }}</td>
                                    --}}
                                    <td class="cod">{{ $d->codigo }}</td>
                                    <td class="cat">{{ $d->categoria }}</td>
                                </tr>
                                {{-- {{ route('') }} --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-------------------- Scripts ----------------------->
    <script type="text/javascript">
        //Verifica se é celular ou telefone para aplicar a mascara

        $(document).ready(function() {
            $("#searchProd").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableProdBody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(function() {
            $('input[type="checkbox"]').change(function() {
                // We check if one or more checkboxes are selected
                // If one or more is selected, we perform filtering
                if ($('input[type="checkbox"]:checked').length > 0) {

                    
                        var a = $("input:checkbox:checked").map(function() {
                            return $(this).val()
                        }).get()
                        $("#tableProdBody tr").hide();
                        var cat = $(".cat").filter(function() {
                            var cate = $(this).text(),
                                index = $.inArray(cate, a);
                            return index >= 0
                        }).parent().show();
                        // first().change()

                } else {
                    // Show all
                    $('table tr').show();
                }
            });
        });

    </script>
@endsection
