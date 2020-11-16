@extends('layouts.app', ['page' => __('Fornecedores'), 'pageSlug' => 'fornecedores'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="container-title">
                <span class="title">Meus Fornecedores</span>
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
                    <input class="input-search" id="searchForn" type="text" placeholder="Pesquisar fornecedor">
                </div>
                <div class="button-action">
                    <a href="{{ route('adm.fornecedores.cadFornecedores') }}" ">
                    <button type=" button" class="btn btn-primary">Novo Fornecedor</button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    {{-- <p>{{ $data }}</p> --}}
                    <table id="tableForn" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Razão Social</th>
                                {{-- <th scope="col">Fantasia</th> --}}
                                <th scope="col">CNPJ</th>
                                <th scope="col">Telefone</th>
                            </tr>
                        </thead>
                        <tbody id="tableFornBody">
                            @foreach ($data as $d)
                                <tr style="cursor: pointer;" onclick="location.href = 'fornecedor/edit/{{$d->id}}'">
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->fornecedor }}</td>
                                    {{-- <td>{{ $d->fantasia }}</td> --}}
                                    <td class="cnpj">{{ $d->cnpj }}</td>
                                    <td class="tel">{{ $d->telefone }}</td>                                
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
        var celOrTel = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-0000';
        };
        $('.tel').mask(celOrTel);

        $(document).ready(function() {
            $('.cnpj').mask('00.000.000/0000-00', {
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
@endsection
