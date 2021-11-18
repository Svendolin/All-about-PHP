<?php
function writeNav( $navitems=array(), $classes='nav' ){
	$html = '';
	$currentScriptFileParts = explode('/', $_SERVER['SCRIPT_NAME']);
	$currentScript = array_pop($currentScriptFileParts);
	
	if(count($navitems)>0) {
		
		$html .= '<ul class="'.$classes.'">'."\n";
		foreach($navitems as $item){
			$activeClass = $currentScript==$item['link'] ? 'uk-active':'';
			$html .= '	<li class="nav-item '.$activeClass.'">'."\n";
			$html .= '		<a class="" href="'.$item['link'].'">'.$item['title'].'</a>'."\n";
			$html .= '	</li>'."\n";
		}
		$html .= '</ul>'."\n";
		
	}
	return $html;
}

?>