<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
require_once("../engine/mysql.php");
require_once("../engine/image.php");

$db=new MySQL("localhost","root","","gallery");


if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$salt = time();
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	
	$db->query("INSERT INTO immagini(id_foto,descrizione,nomefile,parolechiave,foto_album) VALUES('','','".$salt.'_'.$_FILES['Filedata']['name']."','','".$_REQUEST['foto_album']."')");
	
	$targetFile =  str_replace('//','/',$targetPath) . $salt .'_'. $_FILES['Filedata']['name'];
	
	//Creo la miniatura
	$img = new Image($tempFile);
	$img->resize(300);
	$img->save(str_replace('//','/',$targetPath).'t'.$salt.'_'.$_FILES['Filedata']['name']);
	
	//Salvo l'originale
	$img = new Image($tempFile);
	$img->resize(700);
	$img->save($targetFile);
	
	move_uploaded_file($tempFile,$targetFile);
	
	echo '1';
}
?>