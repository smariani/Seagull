<h3> <?php echo($messaggio); ?> </h3>
<div style="<?php if ((!isset($status)) OR ((isset($status)) AND ($status === false))) echo "display: none;"; ?>">
<button type="button" onclick="window.location = 'aggiungi'">aggiungi</button>
<table>
	<th>Nome</th>
	<th>Prezzo</th>
	<th>Azioni</th>
	<?php foreach($prodotti as $prodotto) : ?>
	<tr class="rigaTabella"> 
		<td><?php echo $prodotto['Prodotto']['nome']; ?></td>
		<td><?php echo $prodotto['Prodotto']['prezzo']; ?></td>
		<td>
			<button onclick="window.location = 'modifica/<?php echo $prodotto['Prodotto']['id'];?>'">modifica</button>
			<button onclick="window.location = 'cancella/<?php echo $prodotto['Prodotto']['id'];?>'">cancella</button>
			<button onclick="window.location = 'visualizza/<?php echo $prodotto['Prodotto']['id'];?>'">visualizza</button>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>