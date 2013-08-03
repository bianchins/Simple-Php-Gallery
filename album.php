<?php 

//For testing
$id_album = $_REQUEST['id_album'];

require_once("engine/mysql.php");
require_once("engine/image.php");

$db=new MySQL("localhost","root","","gallery");

if($_GET['action']=='delete') {
	$db->query("DELETE FROM immagini WHERE id_foto='".$_GET['id_foto']."'");
}

include("template/header.php");
?>
<a href="index.php">Torna indietro</a>
<br/><br/>
<h2>Aggiungi nuove foto all'album</h2>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#file_upload').uploadify({
        'uploader'  : 'uploadify/uploadify.swf',
        'script'    : 'uploadify/uploadify.php',
        'cancelImg' : 'uploadify/cancel.png',
        'folder'    : 'images',
		'auto'		: true,
		'removeCompleted' : true,
		'onAllComplete' : function(event,data) {
      		alert(data.filesUploaded + ' immagini caricate!');
			location.reload(true);
    	},
        'scriptData'  : {'foto_album':'<?php echo $id_album?>'}
      });
    });
    </script>

    <input id="file_upload" name="file_upload" type="file" />
<br/>
<!--<a href="javascript:$('#file_upload').uploadifyUpload();">Carica i files</a>-->
    <h2>Immagini esistenti nell'album selezionato:</h2>
<ul class="hoverbox">
<?php 
$query = $db->query("SELECT * FROM immagini WHERE foto_album='".$db->escape($id_album)."'");
foreach($query->rows as $row) {
if(true) {//if(file_exists("images/t".$row['nomefile'])) {
	?>
	<li>
	<a href="immagini.php?id_foto=<?php echo $row['id_foto']?>&id_album=<?php echo $id_album?>"><img src="images/t<?php echo $row['nomefile']?>" alt="description" /><img src="images/t<?php echo $row['nomefile']?>" alt="description" class="preview" /></a>
	<br/><a href="album.php?id_foto=<?php echo $row['id_foto']?>&id_album=<?php echo $id_album?>&action=delete" onclick="return confirm('Sei sicuro?');">Elimina</a><br/>
	</li>
	<?php 
	} 
}
?>
</ul>    
 <?php include("template/footer.php");?>   