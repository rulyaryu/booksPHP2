<?php 
	$booksOnPage = 30;

	if(isset($_GET['q'])) {
		echo $_GET['q'] . '<br>'; 
	}

	if(isset($_GET['cat']) && $_GET['cat'] !== 'All') {

		$cat = $_GET['cat'];

		// echo $cat . '<br>';

			$count = 0;
			$catlen = strlen($cat) * (-1) - 2;
			$src = new SplFileObject('data/src.csv');
			while($src->valid()) {
			$tmp = str_getcsv($src-> current());
			if(isset($tmp[6]) && (strrpos($tmp[6], $cat) !== false)) { 
				$count++;
			}
			$src->next();
		}

		echo $count . '   ';
	}


	// echo getNumOfBooks($cat);

	$src = new SplFileObject('data/src.csv');

	$src->seek(PHP_INT_MAX);

	$max = $src->key()-1;
	
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	// isset($_GET['page']) ? $page = $_GET['page'] : $page = 6919;

	$lastIdx = $page * $booksOnPage;
	$startIdx = ($lastIdx - $booksOnPage) + 1;
	$booksIdx = array_fill($startIdx, $booksOnPage, '');


	$booksDataArr = [];
	
	$arrayKeys = ['id', 'imgId', 'imgUrl', 'bookName', 'author', 'catId', 'category'];

	$categoryArr = [];

	if(isset($_GET['q'])) {
		$src->rewind();
		while($src->valid()) {
			$tmp = str_getcsv($src-> current());
			if(isset($tmp[4]) && (strripos($tmp[4], $_GET['q']) !== false)) {
				// echo $tmp . '<br>';
				$booksDataArr[] = array_combine($arrayKeys, $tmp);
			}
			$src->next();
		}

		$max = count($booksDataArr);
		if($max == 0) echo 'No books founded' . '<br>';
		if ($max % $booksOnPage == 0) 
		$limitPage = intval($max / $booksOnPage);
		else
		$limitPage = 1 + intval($max / $booksOnPage);

	} elseif(isset($cat)) {
		$src->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);
	
		foreach ($src as $key => $value) {
			if(count($categoryArr) == $startIdx + $booksOnPage) {
				break; // end here
			}
			if  (end($value) == $cat) {
				$categoryArr[] = array_combine($arrayKeys, $value);
			}
		}

		$booksDataArr = array_slice($categoryArr, $startIdx, $booksOnPage);
		// foreach ($categorySlicedArr as $key => $value) {
		// 	$booksDataArr[] = array_combine($arrayKeys, $value);
		// }

		$max = $count - 1; // stops here

		// $limitPage = 1 + ($max - ($max % $booksOnPage)) / $booksOnPage;

		if ($max % $booksOnPage == 0) 
			$limitPage = intval($max / $booksOnPage);
		else
			$limitPage = 1 + intval($max / $booksOnPage);

		echo $max % $booksOnPage . '  ';
		echo $limitPage;


	} else {

		foreach ($booksIdx as $idx => $val) {
				$src->seek($idx);
				if (count(str_getcsv($src->current())) == 7) {
					$booksDataArr[] = array_combine($arrayKeys,str_getcsv($src->current()) );
				}
				$src->next();
		}

			$limitPage = 1 + ($max - ($max % $booksOnPage)) / $booksOnPage;
	}

	

	$booksChunkedArr = array_chunk($booksDataArr, 3);

	// var_dump($booksChunkedArr);




 ?>


 <!-- 1-30 31-60 -->