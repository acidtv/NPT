
<h2><?=$title?></h2>

<form method="post">

<p>
<a class="small_button" href="/<?=$request->uri(array('action' => 'edit'))?>">Add new</a>
</p>

<?=$page_links?>

<table class="browse" width="100%">
	<tr>
		<?foreach ($records[0] as $field => $value){?>
			<th><?=$field?></th>
		<?}?>
			<th></th>
	</tr>
<?foreach ($records as $record) {?>
	<tr>
		<?foreach ($record as $field => $value){?>
			<!--<td><?=$record[$field]?></td>-->
			<td><?=$value?></td>
		<?}?>
		<td class="buttons">
			<a class="small_button" href="/<?=$request->uri(array('action' => 'edit', 'id' => $record['id']))?>">edit</a>
			<a class="small_button" href="/<?=$request->uri(array('action' => 'delete', 'id' => $record['id']))?>">delete</a>
		</td>
	</tr>
<?}?>
</table>
</form>

<?=$page_links?>
