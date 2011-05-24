
<h2>Groentekalender</h2>

<form method="post">
<table border="1" width="100%">
	<tr>
		<td></td>
		<th>Name</th>
		<th>Type</th>
		<th>1. Jan</th>
		<th>2. Feb</th>
		<th>3. Mrt</th>
		<th>4. Apr</th>
		<th>5. Mei</th>
		<th>6. Jun</th>
		<th>7. Jul</th>
		<th>8. Aug</th>
		<th>9. Sep</th>
		<th>10. Okt</th>
		<th>11. Nov</th>
		<th>12. Dec</th>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="name" value="<?=$vegetable->name?>" /></td>
		<td><?=Form::select('vegetabletype_id', ORM::factory('vegetabletype')->find_all()->as_array('id', 'name'))?></td>
		<td><?=Form::checkbox('month_1', 1, (bool)$vegetable->month_1)?></td>
		<td><?=Form::checkbox('month_2', 1, (bool)$vegetable->month_2)?></td>
		<td><?=Form::checkbox('month_3', 1, (bool)$vegetable->month_3)?></td>
		<td><?=Form::checkbox('month_4', 1, (bool)$vegetable->month_4)?></td>
		<td><?=Form::checkbox('month_5', 1, (bool)$vegetable->month_5)?></td>
		<td><?=Form::checkbox('month_6', 1, (bool)$vegetable->month_6)?></td>
		<td><?=Form::checkbox('month_7', 1, (bool)$vegetable->month_7)?></td>
		<td><?=Form::checkbox('month_8', 1, (bool)$vegetable->month_8)?></td>
		<td><?=Form::checkbox('month_9', 1, (bool)$vegetable->month_9)?></td>
		<td><?=Form::checkbox('month_10', 1, (bool)$vegetable->month_10)?></td>
		<td><?=Form::checkbox('month_11', 1, (bool)$vegetable->month_11)?></td>
		<td><?=Form::checkbox('month_12', 1, (bool)$vegetable->month_12)?></td>
		<td colspan="6" align="right">
			<input type="submit" value="save" />
		</td>
	</tr>

<?foreach ($vegetables as $veggie) {?>
	<tr>
		<td><?=$veggie->id?></td>
		<td><?=$veggie->name?></td>
		<td><?=$veggie->vegetabletype->name?></td>
		<td><?=$veggie->month_1?></td>
		<td><?=$veggie->month_2?></td>
		<td><?=$veggie->month_3?></td>
		<td><?=$veggie->month_4?></td>
		<td><?=$veggie->month_5?></td>
		<td><?=$veggie->month_6?></td>
		<td><?=$veggie->month_7?></td>
		<td><?=$veggie->month_8?></td>
		<td><?=$veggie->month_9?></td>
		<td><?=$veggie->month_10?></td>
		<td><?=$veggie->month_11?></td>
		<td><?=$veggie->month_12?></td>
		<td>
			<a href="?edit=<?=$veggie->id?>">edit</a>
			<a href="/<?=$request->uri(array('action' => 'delete', 'id' => $veggie->id))?>">delete</a>
		</td>
	</tr>
<?}?>
</table>
</form>
