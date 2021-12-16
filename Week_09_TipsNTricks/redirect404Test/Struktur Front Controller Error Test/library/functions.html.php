<?php
/* generateNav - generiert eine UL/LI Navigation aus einem Array. 
 * @param array $nav_array - zweidimensionales Array, Subarrays müssen einen key 'link' und einen key 'title' haben
 * @return string nav HTML
 */

 // Wird für dieses File NICHT verwendet, Einbau bereits via includes > html > header.html.php
function generateNav($nav_array, $nav_classes){
	$html = '';
	foreach( $nav_array as $item ) {
		$scriptPathArray = explode('/', $_SERVER['SCRIPT_FILENAME']);
		$seite = array_pop( $scriptPathArray );
		
		if($seite == $item['link']){
			$statusKlasse = 'active';
		}else{
			$statusKlasse = '';
		}
		$html .= '	<li class="nav-item col-6 col-md-auto">'."\n";
		$html .= '		<a class="nav-link p-2 '.$statusKlasse.'" href="'.$item['link'].'">'."\n";
		$html .= '			'.$item['title']."\n";
		$html .= '		</a>'."\n";
		$html .= '	</li>'."\n";
	}
	
	return $html;
}
?>

