<div class="row">                    
    <div class="col-md-2">                        
        <div class="form-group">
            <label for="id_usuario">ID usuário:</label>
            <input type="text" class="form-control" maxlength="50" id="id_usuario" name="id_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['id'] ?? '';?>" disabled>
            <input type="hidden" class="form-control" maxlength="50" id="id_usuario" name="id_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['id'] ?? ''; ?>">
        </div>
    </div>                    
    <div class="col-md-4">                        
        <div class="form-group">
            <label for="nome_usuario">Usuário:</label>
            <input type="text" class="form-control" maxlength="50" id="nome_usuario" name="nome_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['users'] ?? '';?>" disabled>
        </div>
    </div>                    
</div>           
<hr>
<div class="row">
<div class="col-md-3">
        <div class="form-group">
            <label for="id_equipamento">Equipamento:</label>
            <select class="form-select" id="id_equipamento" name="id_equipamento" aria-label="Default select example" required>
                <option selected><?= $reserva['equipamento_descricao'] ?? '';?></option>
                <option value="">---</option>
                <?php foreach ($equipamento as $item){?>
                    <option value="<?php echo $item['id']?? '';?>"><?php echo $item['descricao']?? '';?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>     
<hr>
<div class="row">                    
    <div class="col-md-3">                        
        <div class="form-group">
            <label for="data_inicio">Data:</label>
            <input type="date" class="form-control"  id="data_inicio" name="data_inicio" value="<?= $reserva['data_inicio']?? '';?>">
        </div>
    </div>                       
    <div class="col-md-3">                        
        <div class="form-group">
            <label for="id_horario">Horário:</label>
            <select class="form-select" id="id_horario" name="id_horario" aria-label="Default select example" required>
                <option selected><?= $reserva['horario_descricao']?? '';?></option>
                <option></option>
                <?php foreach ($horario as $item){?>
                    <option value="<?php echo $item['id']?? '';?>"><?php echo $item['descricao']?? '';?></option>
                <?php } ?>
            </select>
        </div>                        
    </div>   
    <div class="col-md-3">
    <label for="tipo_reserva">Tipo de Reserva:</label>                    
        <div class="form-group">                                                            
            <select class="form-select" id="tipo_reserva" name="tipo_reserva" aria-label="Default select example" required>                                
            <?php if($reserva['tipo_reserva'] == 'E') { ?>    
                <option value="E">Equipamento</option>                                                                
            <?php } ?>    
                <option value=""> --- </option>                                
                <option value="E">Equipamento</option>                                                                
            </select>
        </div>                    
    </div>                    
</div>                
<hr class="bg-dark">     
<div class="row">
    <div class="form-group">
        <label for="observacoes">Observações: </label>
        <div class="form-floating">
            <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"  style="height: 100px"><?php echo $reserva['observacoes']?? '';?></textarea>
            <label for="observacoes">Escreva algo que queira destacar sobre a reserva:</label>
        </div>
    </div>
</div>