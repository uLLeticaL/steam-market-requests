<?php

$file = file_get_contents('../data/data.json');

$datas = json_decode($file);

?>
<table class="table table-striped table-bordered dTableR" id="data">
	<thead>
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>Game</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Buy</th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach($datas as $data): ?>
			<tr>
				<td><?php echo $data->name; ?></td>
				<td><img src="<?php echo $data->image; ?>" /></td>
				<td><?php echo $data->game; ?></td>
				<td><?php echo $data->price; ?></td>
				<td><?php echo (int)str_replace(',','',$data->quantity); ?></td>
				<td><a target="blank" href="<?php echo $data->url; ?>">Buy</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>