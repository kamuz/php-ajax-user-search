<?php

// Array with names @TODO - Get from database
$people[] = "Anna";
$people[] = "Brittany";
$people[] = "Cinderella";
$people[] = "Diana";
$people[] = "Eva";
$people[] = "Fiona";
$people[] = "Gunda";
$people[] = "Hege";
$people[] = "Inga";
$people[] = "Johanna";
$people[] = "Kitty";
$people[] = "Linda";
$people[] = "Nina";
$people[] = "Ophelia";
$people[] = "Petunia";
$people[] = "Amanda";
$people[] = "Raquel";
$people[] = "Cindy";
$people[] = "Doris";
$people[] = "Eve";
$people[] = "Evita";
$people[] = "Sunniva";
$people[] = "Tove";
$people[] = "Unni";
$people[] = "Violet";
$people[] = "Liza";
$people[] = "Elizabeth";
$people[] = "Ellen";
$people[] = "Wenche";
$people[] = "Vicky";

// Get the q parameter from URL
$q = $_REQUEST["q"];

// Init hint var
$hint = "";

// Lookup all hints from array if $q is different from ""
if ($q !== "") {
	$len = strlen($q);
	foreach($people as $index => $person) {
		// Compare query var and array items
		if (stristr($q, substr($person, 0, $len))) {
			if ($hint === "") {
				// Return fist word
				$hint = '<li class="list-group-item">' . $person . '</li>';
			} else {
				// Return/concat next words
				$hint .= '<li class="list-group-item">' . $person . '</li>';
			}
		}
	}
}
?>

<?php if ($hint === "") : ?>
	<div class="alert alert-warning" role="alert">Sorry, nothing found!</div>
<?php else : ?>
	<p>Results: </p>
	<ul class="list-group">
		<?php echo $hint; ?> 
	</ul>
<?php endif; ?>