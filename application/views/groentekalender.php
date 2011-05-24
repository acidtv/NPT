<style>

body * {
	font-family: Arial;
}

#maanden td {
	width: 100px;
}
#maanden th {
	font-size: 12px;
}

tr.groente th{
	text-align: left;
	width: 100px;
}

tr.groente th { 
	border-bottom: 1px solid #CCC;
}
td.month_regular {
	border: 1px solid #CCC;
}

.mark {
	width: 29px;
	height: 29px;
	opacity: 0.3;
	background-color: #00FF00;
}

table.main {
	table-layout: fixed;
	margin-top: 50px;
	margin-left: 50px;
	width: 460;
	border-collapse: collapse;
}

#getijden td {
	border-right: 1px solid #CCC;
	font-size: 12px;
	text-align: center;
	padding-top: 5px;
}

/* winter */
.m_1, .m_2, .m_12 {
	background-color: #DDD;
}

/* lente */
.m_3, .m_4, .m5 {}

/* zomer */
.m_6, .m_7, .m_8 {
	background-color: #DDD;
}

#maanden .curmonth {
	background-color: black;
	border: 1px solid #555;
	color: white;
}

.groente .curmonth {
	border-left: 1px solid #555;
	border-right: 1px solid #555 !important;
	border-bottom: 1px solid #CCC;
}

#winter { color: blue; }
#lente { color: lime; }
#zomer { color: yellow; }
#herfst { color: brown; }
</style>

<h1>Groentekalender</h1>

<table class="main" cellpadding="0" cellspacing="0" border="0">
	<tr id="maanden">
		<td></td>
		<?foreach ($months as $nr => $month_name) {?>
			<th class="<?if ($nr == $month){?>curmonth<?}?>"><?=$month_name?></th>
		<?}?>
	</tr>
	<?foreach ($vegetables as $vegetable) {?>
		<tr class="groente">
			<th><?=$vegetable->name?></th>
			<?for ($i=1;$i<=12;$i++) {?>
				<td class="m_<?=$i?> <?if ($month == $i) echo 'curmonth'; else echo 'month_regular';?>">
					<?$name = 'month_'.$i; if ($vegetable->$name == 1) {?>
						<div class="mark"></div>
					<?}?>
				</td>
			<?}?>
		</tr>
	<?}?>
	<tr id="getijden">
		<td></td>
		<td id="winter" colspan="2">winter</td>
		<td id="lente" colspan="3">lente</td>
		<td id="zomer" colspan="3">zomer</td>
		<td id="herfst" colspan="3">herfst</td>
		<td>&rarr;</td>
	</tr>
</table>


