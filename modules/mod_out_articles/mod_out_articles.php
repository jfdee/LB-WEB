<?php
defined('_JEXEC') or die;
$text_mod	= (string) $params->get('text_mod', '');
$db =& JFactory::getDBO();
$sql = $db->getQuery(true);
$tableContent  = $db->quoteName('#__content');
$tableUsers = $db->quoteName('#__users');
$tableCategories= $db->quoteName('#__categories');
$sql = $db->getQuery(true);
$sql->select(array('b.title', 'c.name', 'b.modified', 'b.language','month(created)'))
    ->from($db->quoteName('#__content_frontpage', 'a'))
    ->join('INNER', $db->quoteName('#__content', 'b') . ' ON (' . $db->quoteName('a.content_id') . ' = ' . $db->quoteName('b.id') . ')')
	->join('INNER', $db->quoteName('#__users', 'c') . ' ON (' . $db->quoteName('b.created_by') . ' = ' . $db->quoteName('c.id') . ')');
$db->setQuery($sql);
if ($db->query()) {
    $RowCount = $db->getAffectedRows();
$data = $db->loadObjectList('');
$i = 1;
$hintContent="";
$style1="<p style='font-size:10 px;color: orange; border: solid 2px ";
$article = array ();
	if (isset($_REQUEST['add_article'])) {
	   if ($_REQUEST['add_article']==='add') {
		 $d1 = $_REQUEST['color'];
		 $d2 = $_REQUEST['name'];
	   }
	}

	 
	
	print("\t");
	echo "<thead><tr><th>№<th>Название<th>Автор<th>Дата последнего изменения<th>Язык локализации материала</tr></thead>";
	foreach ($data as $row) { 
		if($text_mod=="1"){ 
		if ($row->name==$d2){
			echo $style1."green;text-transform:capitalize;background-color:".$d1."'>";
		print_r($i);
		print("\t");
		print_r($row->title);
		print("\t");
		print_r($row->name);
		print("\t");
		print_r($row->modified);
		print("\t");
		print_r($row->language);
		print("\t");
	}
		else if ($row->name!=$d2){
			echo $style1."green;text-transform:capitalize;' >"; 
			print_r($i).print_r(" Название категории-").print_r($row->title).print_r(" Имя создателя-").print_r($row->name).print_r(" Уровень вложенности-").print_r($row->level);}
			echo "</p>";
		$i=$i+1;}
					$names[] = $row->name;
			};
	if (isset($_REQUEST['add_article'])) {
	   if ($_REQUEST['add_article']==='add') {
		 $d1 = $_REQUEST['color'];
		 $d2 = $_REQUEST['name'];
	   }
	}
	$unique_names = array_unique($names);
	?>
    <form name="new_article">
	<input name='color' type='color' value=".$d1.">
	  <select name="name">
	    <?php foreach ($unique_names as $names) { ?>
		  <option value=<?php echo "\"".$names."\"" ?>> 
		  <?php echo $names ?> 
		  <?php
		  }
		  ?>
	  </select><br>
	  <button name="add_article" type="submit" value="add">Использовать</button></form>
	<?php
	} else {
    // Неудача (например, ошибка в синтаксисе SQL)
   ECHO "<p>Ошибка при работе с БД.</p>"; 
}
?>