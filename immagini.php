<?php 
require_once("engine/mysql.php");
require_once("engine/image.php");

$db=new MySQL("localhost","root","","gallery");

if($_POST['action']=='modifica') {
	$db->query("UPDATE immagini SET descrizione='".$db->escape($_POST['descrizione'])."' WHERE id_foto='".$db->escape($_GET['id_foto'])."'");
}

include("template/header.php");
?>

<?php 
$query = $db->query("SELECT * FROM immagini WHERE id_foto='".$db->escape($_GET['id_foto'])."'");
$riga = $query->row;
?>

<a href="album.php?id_album=<?php echo $_REQUEST['id_album']?>">Torna indietro</a>
<br/><br/>
<h2>Descrizione</h2>
<form action="immagini.php?id_foto=<?php echo $_GET['id_foto']; ?>&id_album=<?php echo $_REQUEST['id_album']?>" method="post">
<input type="hidden" name="action" value="modifica" />
<textarea name="descrizione" style="width:500px;height:90px"><?php echo $riga['descrizione']?></textarea> 
<br/><input type="submit" name="submit" value="Modifica descrizione" />
</form>
<!--
<h2>Url</h2>
<input type="text" style="width:600px" value="<?php echo htmlentities('<center><a href="');?>http://www.moneystamps.it/galleria/images/<?php echo $riga['nomefile'].htmlentities('" rel="lightbox"><img src="'); ?>http://www.moneystamps.it/galleria/images/t<?php echo $riga['nomefile'].htmlentities('" alt=""/></a></center>');?>"/><br/>-->
<h2>Miniatura</h2>
<input type="text" style="width:600px" value="<?php echo htmlentities('<center><img src="'); ?>http://www.moneystamps.it/galleria/images/t<?php echo $riga['nomefile'].htmlentities('" alt=""/><br/><br/></center>');?>"/><br/>
<h2>Immagine</h2>
<img src="images/<?php echo $riga['nomefile']?>" alt="description" />
   
 <?php include("template/footer.php");?>