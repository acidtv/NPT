
<h2><?=$title?> Edit</h2>

<form method="post">
<table border="1" width="100%">

<p>
<a href="/<?=$request->uri(array('action' => '', 'id' => ''))?>">&larr; back</a>
</p>

<?foreach ($screen_objects as $object) {?>
	<tr>
		<td><?=$object->name()?></td>
		<td>
			<?=$object->render_edit()?>
		</td>
	</tr>
<?}?>

	<tr>
		<td></td>
		<td>
			<input type="submit" value="Save" />
		</td>
	</tr>

</table>
</form>
