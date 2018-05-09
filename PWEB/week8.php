
<!--not OOP
<?php
$host = "localhost";
$username = "root";
$password  = "mysql";
$namadb = "dota_g";
$mysqli = mysqli_connect($host,$username,$password,$namadb);

if(mysqli_connect_errno($mysqli))
{
	echo "Gagal";
	mysqli_connect_error();
}
else
{
	echo "sukses";
}
$res = mysqli_query($mysqli, "SELECT 'A world full of ' AS _msg FROM DUAL");
$row = mysqli_fetch_assoc($res);
echo $row['_msg'];

mysqli_close($mysqli);
?>
 !-->

 <html>
 <form>
<p>Input Keyword: <input type = "text" name = "katakunci" value = "">
<input type = "submit" name ="btnsubmit" value = "Cari"> <BR></p>
 </form>
<?php
$host = "localhost";
$username = "root";
$password  = "mysql";
$namadb = "dota_f";

$mysqli = new mysqli($host,$username,$password,$namadb);
if ($mysqli->connect_errno)
 {
 	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
 }

 $katakunci = "";
 if(isset($_GET['katakunci']))
 {
 	$katakunci = $_GET['katakunci'];
 	echo "<p>Pencarian untuk'".$katakunci."':</p>";
 }
 

 $jumlah_per_halaman = 5;
 $start_data = 0;
 if(isset($_GET['start']))$start_data = $_GET['start'];

$sql = "SELECT * From heroes where name Like ?";
$stmt = $mysqli->prepare($sql);
$katakunci2 = "%".$katakunci."%";
$stmt->bind_param('s',$katakunci2);
$stmt->execute();
$res = $stmt->get_result();

$jumlah_data = $res->num_rows;
$jumlah_halaman = ceil($jumlah_data/$jumlah_per_halaman);

$sql = "SELECT * From heroes where name Like ? Limit?,?";
$stmt = $mysqli->prepare($sql);
$katakunci2 = "%".$katakunci."%";
$stmt->bind_param('sdd',$katakunci2,$start_data,$jumlah_per_halaman);
$stmt->execute();
$res = $stmt->get_result();

echo "<table border = '1'>	
	<tr> 
		<th>Hero</th> 
		<th>Name</th> 
		<th>Type</th> 
		<th>Strength</th> 
		<th>Agility</th> 
		<th>Intelligence</th> 
		<th>Damage</th> 
		<th>Armor</th> 
		<th>Is Ranged</th> 
		<th>Action</th>
	</tr>
";

while($row = $res->fetch_assoc()) {
		echo "<tr>  
		<td>".$row['hero_id']."</td>   
		<td>". $row['name']."</td>
		<td>".$row['type']."</td>   
		<td>". $row['strength']."</td> 
		<td>".$row['agility']."</td>   
		<td>". $row['intelligence']."</td> 
		<td>".$row['damage']."</td>   
		<td>". $row['armor']."</td>   
		<td>". $row['is_ranged']."</td>
		<td><a href = 'halamanedit.php?id=".$row['hero_id']."'>edit</a><a href = 'halamandelete.php?id=".$row['hero_id']."'> delete</a></td>
		</tr>";
	}

/* close connection */
echo"</table>";
$mysqli->close();

for($page = 1; $page<=$jumlah_halaman; $page++)
{
	$st = ($page-1)* $jumlah_per_halaman;
	echo"<a href = 'week8.php?start=".$st."&katakunci=".$katakunci."'>".$page."</a> &nbsp; ";
}
?>
