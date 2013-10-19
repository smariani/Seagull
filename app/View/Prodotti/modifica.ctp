<?php if ($status === false) die;?>
<div style="<?php if ((!isset($status)) OR ((isset($status)) AND ($status === false))) echo "display: none;"; ?>">
<form action="../update" method="post">
	<h3>Nome <input type="text" name="nome" value="<?php echo $portata['Portata']['nome']; ?>"></h3>
	<h3>Prezzo <input type="text" name="prezzo" value="<?php echo $portata['Portata']['prezzo']; ?>"></h3>
	<input style="display: none" "text" name="id" value="<?php echo $portata['Portata']['id']; ?>">
	<h3><input type="submit" value="modifica"></h3>
</form>
</div>