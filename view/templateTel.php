<template id="telefone">
    <div class="form-group">
        <label for="telefone" class="sr-only">Telefone</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">{{tipoTelefone}}</span>
            </div>
            <input type="hidden" name="tipo_tel" value="{{tipoTelefone}}">
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite um telefone">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger removerTelefone"><span class="oi oi-minus"></span></button>
            </div>
        </div>
        <small id="phoneHelp" class="form-text text-muted">Não compartilhe esse telefone com
            nínguem.</small>
    </div>
</template>