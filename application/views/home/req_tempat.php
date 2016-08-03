<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Kabupaten</th>
			<th>Kecamatan</th>
		</tr>
		<?php
		$x=1;
		foreach ($datatempat as $key) {
			?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $key['kabkot']; ?></td>
				<td><?php echo $key['kecamatan']; ?></td>
			</tr>
			<?php
		$x++;	
		}
		?>
	</table>