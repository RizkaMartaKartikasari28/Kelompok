<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Pengisian Data Buku Perpustakaan</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#FFFFFF" background="238857_Black Rose.jpg">


<?php 
echo"<form action=\"$php_self\" method=\"post\"  enctype=\"multipart/form-data\">";		
$judulbuku=$_POST['judulbuku'];
$idbuku=$_POST['idbuku'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$thterbit=$_POST['thterbit'];
$email=$_POST['email'];
$tglbeli=$_POST['tglbeli'];
$harga=$_POST['harga'];
$img_name=$_FILES['img']['name'];
$img=$_FILES['img']['tmp_name'] ;

if($aktiv=="")
        {$aktiv=0;}

if($_POST['cancel'])
{$aktiv=0;}

include_once("db_connect.php"); //panggil koneksi database

if($_POST['baru'])
	{  $aktiv=1; $judulbuku="";$idbuku="";$pengarang="";$penerbit="";$thterbit="";$email="";$tglbeli="";$harga="";$img=""; }

if($_POST['update'])
	{ 
		$pattern = "/^[\w-]+(\.[\w-]+)*@";
		$pattern .= "([0-9a-z][0-9a-z-]*[0-9a-z]\.)+([a-z]{2,4})$/i";
		if($judulbuku=="" or $idbuku=="" or $pengarang=="" or $penerbit=="" or $thterbit=="" or $email=="" or $tglbeli=="" or $harga=="")
		       {   
			$kosong=1; 
			$aktiv=1;
		       }
		elseif(!preg_match($pattern,$email))		
		        { 		
			$aktiv=1;
			$noemail=1;		
		        } 
		else
		       {
			   $query= "insert into kelompok
(judulbuku,idbuku,pengarang,penerbit,thterbit,email,tglbeli,harga) 
				    values ('$judulbuku','$idbuku','$pengarang','$penerbit','$thterbit','$email','$tglbeli', '$harga')"; 
				     mysql_query($query) or die (mysql_error() );
			   if($img_name<>"")
				{ 
				     copy ("$img","images/$img_name");
				     $query= "update kelompok set img='$img_name' where email='$email'";
				      mysql_query($query) or die (mysql_error() );
				}			
			    $aktiv=0; // rubah posisi  jadi posisi tampildata
			}
}
if($aktiv==1)
{ $disabled="";} else {$disabled="disabled";}
?>
<table width="50%" align="center">
<tr><td>
<center><b><marquee><font face="forte" color="white" size="7,5">Daftar Buku Perpustakaan</font></b></marquee></center></tr>
<table width="60%" border="3" align="center"><br>
	<tr><td width="5%"><font color="white"><b>Judul Buku</b></font></td>
		<td width="2%"><font color="white">:</td></font>
		<td width="30%">
<?php echo"<input name=\"judulbuku\" $disabled type=\"text\" style=\"width: 99%\" value=\"$judulbuku\">"; ?>
		</td>
	</tr>
    	<tr><td><font color="white"><b>Id Buku</b></font></td>
      		 <td><font color="white">:</td></font>
      		 <td> <?php echo"<input name=\"idbuku\" $disabled  type=\"text\"
			 style=\"width: 99%\" value=\"$idbuku\">"; ?>
		 </td>
    </tr>
  	<tr><td><font color="white"><b>Pengarang</b></font></td>
      		 <td><font color="white">:</td></font>
      		 <td> <?php echo"<input name=\"pengarang\" $disabled  type=\"text\"
			 style=\"width: 99%\" value=\"$pengarang\">"; ?>
		 </td>
  	</tr>
       	<tr><td><font color="white"><b>Penerbit</b></font></td>
      		 <td><font color="white">:</td></font>
      		 <td> <?php echo"<input name=\"penerbit\" $disabled  type=\"text\"
			 style=\"width: 99%\" value=\"$penerbit\">"; ?>
		 </td>
  	</tr>
       	<tr><td><font color="white"><b>Tahun Terbit</b></font></td>
      		 <td><font color="white">:</td></font>
      		 <td> <?php echo"<input name=\"thterbit\" $disabled  type=\"text\"
			 style=\"width: 99%\" value=\"$thterbit\">"; ?>
		 </td>
  	</tr>
     
     <tr><td><font color="white"><b>Email</b></font></td>
		<td><font color="white">:</td></font>
		<td><?php echo"<input name=\"email\" $disabled  type=\"text\" style=\"width: 
			99%\"  value=\"$email\">"; ?>
		</td>
    </tr>
	<tr><td><font color="white"><b>Tanggal Beli</b></font></td>
		<td><font color="white">:</td></font>
		<td><?php echo"<input name=\"tglbeli\" $disabled  type=\"text\" style=\"width: 
			99%\"  value=\"$tglbeli\">"; ?>
		</td>
    </tr>
	<tr><td valign="top"><font color="white"><b>Harga Buku</b></font></td>
	      <td valign="top"><font color="white">:</td></font>
	      <td><textarea name="harga" <?php echo"$disabled" ?> cols="20" rows="1" 
		        align="left" style="width: 99%"><?php echo"$harga" ?> </textarea>
		</td>
  	</tr>
  	<tr>
     		<td valign="top"><font color="white"><b>Photoku</b></font></td>
      		<td valign="top"><font color="white">:</td></font>
            		<td><img src="images/<?php echo"$img_name"; ?>" alt="" border="0"><br>
		<input type="file" name="img" style=" width: 306px">
		</td>
  	</tr>  
  	<tr><td>&nbsp;</td><td>&nbsp;</td>
      		<td valign="bottom" height="50">
	 	 <?php if($aktiv==1)
	  		{echo" <input name=\"update\" type=\"submit\" value=\"Update\">
 <input name=\"cancel\" type=\"submit\" value=\"Cancel\" class=\"bottom\">";}
	 	 else
	  		{echo" <input name=\"baru\" type=\"submit\" value=\"Record Baru\">";} ?>

      		</td>
 	</tr>
	
</table>
</td></tr>
</table>
</form>
</body>

<br><br><br><br><br><br>
<tr height="50">
<td colspan='2'background='images/background2.jpg'><center><b><marquee><font face="forte" color="white" size="4,5">Pemrograman Web 1 (Tugas Kelompok)- Mengenal Insert Data Melalui Form - </font></b></marquee></center></td></tr>

</html>

<?php
if($kosong==1)
	{echo" <script>alert('Ingat: Data harus lengkap diisi, silahkan diperhatikan...!!!'); </script>";}
if($noemail==1)
	{echo" <script>alert('Format email Anda salah !!!'); </script>";}		
?>

