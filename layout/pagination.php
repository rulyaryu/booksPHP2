<?php 
	require './model4.php';
 ?>

<div class="coontainer d-flex justify-content-center mt-5 mb-5">
	<nav aria-label="Books Page Navigation">
	  <ul class="pagination">
	    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
	      <a class="page-link" href="index.php?page=1<?=isset($cat) ? '&cat=' . urlencode($_GET['cat'])	: ''?>" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>

		<li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
					<a class="page-link" href="index.php?page=<?= $page-1 ?><?=isset($cat) 
																																					? '&cat=' . urlencode($_GET['cat'])
																																					: ''
					?>">Previous</a>
    	</li>

	    <li class="page-item active">
	    	<a class="page-link" href="#!"><?= $page ?></a>
	    </li>


	    <li class="page-item <?= $page == $limitPage ? 'disabled' : '' ?>">
					<a class="page-link" href="index.php?page=<?= $page+1?><?=isset($cat) 
																																					? '&cat=' . urlencode($_GET['cat'])
																																					: ''
					
					?>">Next</a>
    	</li>

	    <li class="page-item <?= $page == $limitPage ? 'disabled' : '' ?>">
				<a class="page-link" href="index.php?page=<?=$limitPage?><?=isset($cat) 
																																					? '&cat=' . urlencode($_GET['cat'])
																																					: ''	
				?>" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
	  </ul>
</nav>
</div>