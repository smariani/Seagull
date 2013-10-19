<?php if ($status === false) die;?>

<form action="salva" method="post">
	<h3>Nome <input type="text" name="nome"></h3>
	<h3>Prezzo <input type="text" name="prezzo"></h3>
	<h3><input type="submit" value="salva"></h3>
	<h3><input type="submit" value="salva e aggiungi ancora" name="altro"></h3>
</form>