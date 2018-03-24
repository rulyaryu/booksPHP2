<?php require './data/category.php' ?>

<div class="container-fluid bg-dark">
	<div class="container">
		<nav class="nav d-flex justify-content-around pt-4 pb-4">
			<li class="nav-item">
				<form class="d-flex" method='get'>
				    <input type="search" id="mySearch" name="q" class="mr-4">
				    <button class="btn btn-success" type='submit'>	Search
				    </button>
				</form>
			</li>
			<li class="nav-item">
				<div class="dropdown show">
					  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo isset($_GET['cat']) ? $_GET['cat'] : 'выберите категорию' ?>
					  </a>

					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					  	<a class="dropdown-item" href="index.php?cat=All">All</a>
					    <?php foreach ($category as $value): ?>
					    	<a class="dropdown-item" href="index.php?cat=<?=urlencode($value)?>"><?=$value?></a>
					    <?php endforeach ?>
					  </div>
					</div>
			</li>
		</nav>
	</div>
</div>