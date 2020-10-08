<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{URL::asset('css/yourapp.css')}}"> --}}
    <script> 
        document.addEventListener('keydown', function(e) {
            if(e.key == "F2"){
                document.getElementById("btFechar").click();
            }
        });
    </script>
    <title>Ponto de Venda</title>
</head>

<body>
    <input style="display: none" type="button" id="btFechar" onclick="window.location='{{ url("home") }}'"/>
</body>

</html>