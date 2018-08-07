<form action="<?=@$acao?>" method="POST">
    nome: <input type="text" name="nome" value="<?=@$usuario['nome']?>">
    email: <input type="text" name="email" value="<?=@$usuario['email']?>">
    <select name="sexo">
        <option value="m" <?=@assinalarCampo($usuario['sexo'], 'm')?>>Masculino</option>
        <option value="f" <?=@assinalarCampo($usuario['sexo'], 'f')?>>Feminino</option>
    </select>
    <button type="submit">Enviar</button>
</form>