<?php

try{
			//http://php.net/manual/en/language.exceptions.php (try/catch/final...)
			
		require_once( 'tag_parsing.php' );
		
		//$html = htmlspecialchars( $fileString, ENT_COMPAT,'ISO-8859-1', true);
			// http://php.net/manual/en/function.htmlspecialchars.php (htmlspecialchars...)
		
		$html = str_replace( $fileString, "&", "&amp;" );
		
		$strict = 1;
		
		$doc_type_tag = "doc_type";
		$pattern = "/<$doc_type_tag>(.*?)<\/$doc_type_tag>/";
		$doc_type_text = preg_match($pattern, $fileString);
		
		echo $doc_type_text;
		
		$board_type_tag = "board_type";
		
		$board_location_tag = "board_location";
		
		$board_date_tag = "board_date";
		
	} catch ( Exception $e ) {
		
		echo 'Caught exception: ',  $e->getMessage(), "\n";
		
	} finally {
		
	}
 
 function getTextBetweenTags($string, $tagname)
 {

    return $matches[0];
 }
?>