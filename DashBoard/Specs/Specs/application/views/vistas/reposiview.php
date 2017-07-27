<?PHP
	if(($reposiview)){
	foreach ($reposiview->result() as $repo ) { ?>
			<ul>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Mercado; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Sitio; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Banner; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Size; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Formato; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Weight; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->ClickTag; ?></a></li>
				<li><a href="<?= $repo->id_user; ?>"><?= $repo->Observaciones; ?></a></li>
				<!--<li><a href="<?= $repo->id_user; ?>"><?= $repo->EmailAddress; ?></a></li>-->
			</ul>	
		<?php } 

		}
		else{
			echo "<p>!!El Id buscado no existe en la base de datos.!!</p>";
			
		}
?>
</body>
</html>