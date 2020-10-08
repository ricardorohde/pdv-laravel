<script> 
    document.addEventListener('keydown', function(e) {
        if(e.key == "F2"){
            document.getElementById("btFechar").click();
        }
    });
</script>
<input style="display: none" type="button" id="btFechar" onclick="window.location='{{ url("pdv") }}'"/>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            {{-- <a href="#" class="simple-text logo-mini">{{ __('') }}</a> --}}
            <a href="#" class="simple-text logo-normal">{{ __('Painel Administrativo') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active' " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p  class="title-nav-bar">{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-basket-simple" ></i>
                    <span class="title-nav-bar nav-link-text" >{{ __('Produtos') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'produtos-cadastro') class="active " @endif>
                            <a href="{{ route('adm.produtos.produtos-cadastro')  }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p class="title-nav-bar">{{ __('Cadastrar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'produtos-excluir') class="active " @endif>
                            <a href="{{ route('adm.produtos.produtos-excluir')  }}">
                                <i class="tim-icons icon-trash-simple"></i>
                                <p class="title-nav-bar">{{ __('Excluir') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'estoque') class="active " @endif>
                <a href="{{ route('adm.estoque') }}">
                    <i class="tim-icons icon-components"></i>
                    <p class="title-nav-bar" >{{ __('Estoque') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'financeiro') class="active " @endif>
                <a href="{{ route('adm.financeiro') }}">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p class="title-nav-bar" >{{ __('Financeiro') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'fornecedores') class="active " @endif>
                <a href="{{ route('adm.fornecedores') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p class="title-nav-bar">{{ __('Fornecedores') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p class="title-nav-bar" >{{ __('Notificações') }}</p>
                </a>
            </li>
            
            {{-- <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> --}}
            {{-- <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li> --}}
            {{-- <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
