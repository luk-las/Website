<?php include 'header.php'; 

require_once 'database_connect.php';
	
	if(isset($_GET['posts'])){
			$id=$_GET['posts'];
			$query2="SELECT * FROM places where id='$id'";
			$readd = $db -> prepare($query2);
			$readd -> execute();
	}	
	
?>

<main class="container">
		
	<table class="table table-responsive">
		<thead>
			<tr>
				<th scope="col" class="arr">Nazwa</th>
				<th scope="col" class="arr">Lokalizacja</th>
				<th scope="col" class="arr">Przeznaczenie</th>
				<th scope="col" class="arr">Data powstania</th>
				<th scope="col" class="arr">Dostęp</th>
				<th scope="col" class="arr">Opis</th>
				<th scope="col" class="arr">Zdjęcia</th>
				<th scope="col" class="arr">Edycja</th>
			</tr>
		</thead>
		<tbody> 
			<?php while($row=$readd->fetch(PDO::FETCH_ASSOC)){ ?> 
  
			<tr class="table-active">      
				<td class="tab"><?= $row['name']; ?></td>
				<td class="tab"><?= $row['localization']; ?></td>
				<td class="tab"><?= $row['type']; ?></td>
				<td class="tab"><?= $row['date']; ?></td>
				<td class="tab"><?= $row['access']; ?></td>
				<td class="tab"><?= $row['description']; ?></td>
				<td class="photos tab"><?php 
					if ($row['image'] != ""){
					$image_name=	"SELECT * FROM places as p join details as d on p.id = d.placeId 
											where d.placeId = ".$row['id'];
					$read1=$db -> prepare($image_name);
					$read1 -> execute();
				
					foreach($read1 as $value){ ?>						
						<a href="upload/<?= $value['image']; ?> " data-lightbox="image-lb"><img src="upload/<?= $value['image']; ?> "></a><?php }} ?>									
				</td>
	
				<form action="" method="post">
				<td class="tab"><button type="submit" class="btn-single" name="submit"><?php if($row['id']>6){ ?>Usuń<?php } ?></button></td>
				</form> 	
			</tr>
	
	<?php
	if(isset($_POST['submit'])){
			$id=$row['id'];
			if($id>6)
			$db->query("DELETE FROM places where id='$id'");
	}
	} ?>
	
		</tbody>
	</table>
</main>

<?php include 'footer.php'; ?>