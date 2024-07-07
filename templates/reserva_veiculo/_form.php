<div class="row">                    
    <div class="col-md-2">                        
        <div class="form-group">
            <label for="id_usuario">ID usuário:</label>
            <input type="text" class="form-control" maxlength="50" id="id_usuario" name="id_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['id']?>" disabled>
        </div>
    </div>                    
    <div class="col-md-2">                        
        <div class="form-group">
            <label for="nome_usuario">Usuário:</label>
            <input type="text" class="form-control" maxlength="50" id="nome_usuario" name="nome_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['users']?>" disabled>
        </div>
    </div>                    
</div>                
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id_sala">Sala:</label>
            <select class="form-select" id="id_sala" name="id_sala" aria-label="Default select example" required>
                <option selected> --- </option>
                <?php foreach ($sala as $item){?>
                    <option value="<?php echo $item['id']?>"><?php echo $item['descricao']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">                        
        <div class="form-group">
            <label for="data_inicio">Data Inicio:</label>
            <input type="date" class="form-control"  id="data_inicio" name="data_inicio" required>
        </div>
    </div>   
    <div class="col-md-3">                        
        <div class="form-group">
            <label for="data_final">Data Final:</label>
            <input type="date" class="form-control" id="data_final" name="data_final" required>
        </div>
    </div>   
    <div class="col-md-3">
        <div class="form-group">
            <label for="id_horario">Horario:</label>
            <select class="form-select" id="id_horario" name="id_horario" aria-label="Default select example" required>
                <option selected> --- </option>
                <?php foreach ($horario as $item){?>
                    <option value="<?php echo $item['id']?>"><?php echo $item['descricao']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<hr>
<div class="row">
        <label for="id_perfil">Tipo de Reserva:</label>
        <div class="col-md-3">
            <label for="status"></label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="tipo_reserva" name="tipo_reserva" disabled checked>
                <label class="form-check-label" for="status" id="label_tipo_reserva">Sala</label>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group">
            <label for="observacoes">Observações: </label>
            <div class="form-floating">
                <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"  style="height: 100px"></textarea>
                <label for="observacoes">Escreva algo que queira destacar sobre a reserva:</label>
            </div>
        </div>
    </div>