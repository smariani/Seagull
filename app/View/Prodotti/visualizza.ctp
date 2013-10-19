<?php if ($status === false) die;?>
<div style="<?php if ((!isset($status)) OR ((isset($status)) AND ($status === false))) echo "display: none;"; ?>">
<form action="../<?php echo ($ruolo); ?>" method="post">
	<h3>Nome <?php echo $portata['Portata']['nome']; ?></h3>
	<h3>Prezzo <?php echo $portata['Portata']['prezzo']; ?></h3>
	<h3><input type="submit" value="indietro"></h3>
</form>
</div>