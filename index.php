<?php 
require_once("engine/mysql.php");
require_once("engine/image.php");

$db=new MySQL("localhist","root"," ","gallery");

if($_POST['action']=='crea') {
	$db->query("INSERT INTO album(descrizione) VALUES('".$db->escape($_POST['descrizione'])."')");
}
if($_GET['action']=='delete') {
	$db->query("DELETE FROM album WHERE id_album='".$db->escape($_GET['id_album'])."'");
}

include("template/header.php");
?>
<h2>Album immagini disponibili</h2>
<ul class="hoverbox">
<?php 
$query = $db->query("SELECT * FROM album");
foreach($query->rows as $row) {
?>
<li>
<div style="font-size:28px;text-align:center;"><?php echo $row['id_album']?></div>
<a href="album.php?id_album=<?php echo $row['id_album']?>">
<br/><?php echo $row['descrizione']?></a>
<br/><a href="index.php?action=delete&id_album=<?php echo $row['id_album']?>" style="font-size:10px" onclick="return confirm('Sei sicuro?')">(Elimina)</a>
</li>
<?php } ?>
</ul>
<form action="index.php" method="post">
<input type="hidden" name="action" value="crea" />
<div style="clear:both;padding-top:10px;padding-bottom:10px;"></div>
<h2 style="padding-top:4px;">Nuovo album</h2>
Inserisci il nome del nuovo album: <input type="text" name="descrizione" value="" />
<input type="submit" name="submit" value="Crea" />
</form>
 <?php include("template/footer.php");?>