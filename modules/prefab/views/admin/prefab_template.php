
<html>
<head>
    <link type="text/css" href="/media/css/admin.css" rel="stylesheet" media="screen" /> 
</head>
<body>
<div id="menu" style="">
<?foreach($menu as $key => $uri){?>
	<a href="/<?=$uri?>"><?=$key?></a>
<?}?>
</div>

<div id="content">
<?=$content?>
</div>

</body>
</html>
