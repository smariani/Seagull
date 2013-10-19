<h3> <?php echo($messaggio); ?> </h3>
<div style="<?php if ((!isset($status)) OR ((isset($status)) AND ($status === false))) echo "display: none;"; ?>">
<button type="button" onclick="window.location = 'aggiungi'">aggiungi</button>
<table>
	<th>Nome</th>
	<th>Prezzo</th>
	<th>Azioni</th>
	<?php foreach($portate as $portata) : ?>
	<tr class="rigaTabella"> 
		<td><?php echo $portata['Portata']['nome']; ?></td>
		<td><?php echo $portata['Portata']['prezzo']; ?></td>
		<td>
			<button onclick="window.location = 'modifica/<?php echo $portata['Portata']['id'];?>'">modifica</button>
			<button onclick="window.location = 'cancella/<?php echo $portata['Portata']['id'];?>'">cancella</button>
			<button onclick="window.location = 'visualizza/<?php echo $portata['Portata']['id'];?>'">visualizza</button>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>