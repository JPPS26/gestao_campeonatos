<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<h2>Exemplo de Validação de Formulário com PHP</h2>
<p><span class="error">* campo obrigatório</span></p>
<form method="post" action="processar.php">  
  Nome: <input type="text" name="name">
  <span class="error">*</span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">*</span>
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comentário: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gênero:
  <input type="radio" name="gender" value="female">Feminino
  <input type="radio" name="gender" value="male">Masculino
  <input type="radio" name="gender" value="other">Outro  
  <span class="error">*</span>
  <br><br>
  <input type="submit" name="submit" value="Enviar">  
</form>

</body>
</html>