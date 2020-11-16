<style>
    .card-mini {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100px */
    }

    .center-flex {
        display: flex;
        justify-content: center;
        align-content: center;
    }

</style>
<div class="card">
    <div class="card-header">
    </div>
    <div style="padding:0 40px;" class="card-body">

        <form name="formEstoqueEntrada">
            @csrf
            <div class="subsecao">
                <div class="form-row form-resp">
                    <div style="width:200px" class="form-group">
                        <label class="required" for="cod">Código</label>
                        <input class="form-control" type="text" id="cod" name="cod"">
                        <span id=" error-cod" class="error-message d-none"></span>
                    </div>
                </div>
        </form>
    </div>
</div>
