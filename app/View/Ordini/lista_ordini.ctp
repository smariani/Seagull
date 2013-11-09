<h3> <?php echo($messaggio); ?> </h3>
<div style="<?php if ((!isset($status)) OR ((isset($status)) AND ($status === false))) echo "display: none;"; ?>">
<button type="button" onclick="window.location = 'aggiungi'">aggiungi</button>
<table>
	<th>Tavolo</th>
	<th>Data</th>
	<th>Stato</th>
	<th>Azioni</th>
	<?php foreach($ordini as $ordine) : ?>
	<tr class="rigaTabella"> 
		<td><?php echo $ordine['Ordine']['id']; ?></td>
		<td><?php echo $ordine['Ordine']['data']; ?></td>
		<td><?php echo $ordine['Ordine']['stato']; ?></td>		
		<td>
			<button onclick="window.location = 'modifica/<?php echo $ordine['Ordine']['id'];?>'">modifica</button>
			<button onclick="window.location = 'cancella/<?php echo $ordine['Ordine']['id'];?>'">cancella</button>
			<button onclick="window.location = 'visualizza/<?php echo $ordine['Ordine']['id'];?>'">visualizza</button>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>