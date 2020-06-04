<?php include 'header.php'; 

require_once 'database_connect.php';
	
		$query = 'SELECT * FROM places';
		$read = $db -> prepare($query);
		$read -> execute();		
		$read_1 = $db -> prepare($query);
		$read_1 -> execute();		
		$read_2 = $db -> prepare($query);
		$read_2 -> execute();

?>

<header>
	<div class="container-fluid">
		<div class="banner">
			<a href="http://andrzej-banach.eu/szlaki-turystczne/mazowsze/zapomniany-most/" target="_blank" title="Dawny most kolejowy na Narwi" alt="Ciekawe miejsce nad Narwią">
				<img src="images/glowna.jpg"/>
			</a>
		</div>
	</div>

	<div class="maintitle"> Ciekawe i mało znane miejsca na Mazowszu </div>
</header>

<main>	
	<article class="container">
		<nav id="leftpart">
			<ul>
				<?php while ( $row=$read_1->fetch(PDO::FETCH_ASSOC)){  ?> 
				<li><a href="#" id="link<?= $row['id']; ?>"><?= $row['name']; ?></a></li>
				 <?php }?>		 
			</ul>

		</nav>

		<section class="table-responsive" id="middlepart">
			<table class="table">
				<thead>
					<tr>  
						<th scope="col" class="arr">Nazwa</th>
						<th scope="col" class="arr">Lokalizacja</th>
						<th scope="col" class="arr">Zdjęcie</th>
						<th scope="col" class="arr">Szczegóły</th>
					</tr>
			  </thead>
			  <tbody>
				<?php while ( $row=$read->fetch(PDO::FETCH_ASSOC)){  ?>  	  
				<tr id="location<?= $row['id']; ?>" class="table-active">
					<td class="tab"><?= $row['name']; ?></td>
					<td class="tab"><?= $row['localization']; ?></td>
					<td class="mainphoto tab">
						<?php if($row['image'] != "") { ?>
						<a href="upload/<?= $row['image']; ?>" data-lightbox="image-lb"><img src="upload/<?= $row['image']; ?>"/></a>
						<?php } ?></td>
					<td class="tab"><a href="single.php?posts=<?= $row['id']; ?>" id="moreInformation">Więcej...</a></td>
				</tr>
				<?php }?>
			  </tbody>
			</table>
		</section>
		<div style="clear:both;"></div> 	

		<a href="#" class="scrollup"><img src="images/scroll_up.png"/></a>

	</article>
</main>

<?php include 'footer.php'; ?>

<script src="js/jquery.scrollTo.min.js"></script>
	<script>
		jQuery(function($)
		{			
			$.scrollTo(0);		
			
			<?php while ( $row=$read_2->fetch(PDO::FETCH_ASSOC)){  ?> 
			$('#link<?= $row['id']; ?>').click(function() { $.scrollTo($('#location<?= $row['id']; ?>'), 500); });
			<?php }?>
			
			$('.scrollup').click(function() { $.scrollTo($('body'), 1000); });
		}
		);				
		$(window).scroll(function()
		{
			if($(this).scrollTop()>100) 	$('.scrollup').fadeIn();
			else									$('.scrollup').fadeOut();
		}		
		);	
	
</script>