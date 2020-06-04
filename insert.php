<?php include 'header.php'; 

require_once 'database_connect.php';

if(isset($_POST['submit'])){		
	$name = filter_input(INPUT_POST, 'name');
	$localization = filter_input(INPUT_POST, 'localization');
	$type = filter_input(INPUT_POST, 'type');
	$date = filter_input(INPUT_POST, 'date');
	$access = filter_input(INPUT_POST, 'access');
	$description = filter_input(INPUT_POST, 'description');
		
	$target_dir="upload/";
	$target_file= $target_dir . basename($_FILES['image']['name']);
	$temp_file=$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
	$query="INSERT INTO places (name, localization, type, date, access, description, image) VALUES ('$name','$localization','$type','$date','$access','$description','$temp_file')";
	$insert=$db->prepare($query);
	$insert->execute();
	$last_id=$db->lastInsertId();
	$c=count($_FILES['img']['name']);
	if($insert){
		if($c < 10){
				for($i=0; $i < $c; $i++){
					$img_name=$_FILES['img']['name'][$i];
					move_uploaded_file($_FILES['img']['tmp_name'][$i],  "upload/" .$img_name);
					$query_multi="INSERT INTO details(image, placeId) VALUES ('$img_name','$last_id')";
					$ins=$db->prepare($query_multi);
					$ins->execute();
				} 
		}		
	}
}

?>

<main class="container">
	<form action="" method="post" enctype="multipart/form-data">
	  <fieldset>
		<legend>Dodaj miejsce</legend>
		
		<div class="form-group">
		  <label for="exampleInputEmail1">Nazwa obiektu/miejsca</label>
		  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="np. Pałac Kultury i Nauki" onfocus="this.placeholder=''" onblur="this.placeholder='np. Pałac Kultury i Nauki'"	required>
		</div>
		
		<div class="form-group">
		  <label for="exampleInputPassword1">Lokalizacja</label>
		  <input type="text" name="localization" class="form-control" id="exampleInputPassword1" placeholder="np. centrum Warszawy" onfocus="this.placeholder=''" onblur="this.placeholder='np. centrum Warszawy'" required>
		</div>
		
		<div class="form-group">
		  <label for="exampleTextarea">Rodzaj/typ/przeznaczenie obiektu</label>
		  <input type="text" name="type" class="form-control" id="exampleInputPassword1" placeholder="np. kultura" onfocus="this.placeholder=''" onblur="this.placeholder='np. kultura'">
		</div>
		
		<div class="form-group">
		  <label for="exampleInputPassword1">Data powstania</label>
		  <input type="text" name="date" class="form-control" id="exampleInputPassword1" placeholder="np. 1955" onfocus="this.placeholder=''" onblur="this.placeholder='np. 1955'">
		</div>
		
		<div class="form-group">
		  <label for="exampleInputPassword1">Wstęp</label>
		  <input type="text" name="access" class="form-control" id="exampleInputPassword1" placeholder="np. swobodny, bezpłatny" onfocus="this.placeholder=''" onblur="this.placeholder='np. swobodny, bezpłatny'">
		</div>
			
		<div class="form-group">
		  <label for="exampleTextarea">Opis</label>
		  <textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>
		</div>
		
		<div class="form-group">
		  <label for="exampleTextarea">Zdjęcie główne</label>
		  <input type="file" name="image">
		</div>
		
		<div class="form-group">
		  <label for="exampleTextarea">Zdjęcia pozostałe</label>
		  <input type="file" name="img[]" multiple>
		</div>
		
		<script>
			var submitButton = new Audio("sounds/zatwierdz.wav");
			var resetButton = new Audio("sounds/usun.wav");		
		</script>		
				
		<button type="reset" class="btn btn-danger" onclick="resetButton.play()">Usuń</button>
		<button type="submit" name="submit" class="btn btn-primary" onclick="submitButton.play()">Zatwierdź</button>
	  </fieldset>
	</form>
</main>
	
<?php include 'footer.php'; 