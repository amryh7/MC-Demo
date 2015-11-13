<?php

// $file = fopen( "MeetingMinutes/3August2015.txt", "r" ) or die( "Unable to open file!" );
	// http://php.net/manual/en/function.fopen.php (fopen...)
	
// fclose( $myfile );
	// http://php.net/manual/en/function.fclose.php (fclose...)

$keyword = $_REQUEST['search_terms'];
	
$dir = '../../MeetingMinutes/';

//echo fileperms( $dir ) . '<br><br>';
	// http://php.net/manual/en/function.fileperms.php (fileperms...)
	// returns non-standard file prermissions that need to be converted; use following...
	$perms = base_convert( fileperms( $dir ), 10, 8 );
	$perms = substr( $perms, ( strlen( $perms ) - 3 ) );  
		// http://board.phpbuilder.com/showthread.php?10264385-return-value-of-fileperms%28%29
		// echo 'file prermissions:' . $perms . '<br><br>';

//echo is_readable( $dir ) . '<br><br>';
	// http://php.net/manual/en/function.is-readable.php (is_readable...)
	// 1 -->> true; 0 -->> false

//echo print_r( stat( $dir ) ) . '<br><br>';
	// http://php.net/manual/en/function.stat.php (stat...)
	// returns array with file stats
	
if( $perms != '0777' || '0774' ) {
		// http://php.net/manual/en/control-structures.elseif.php (if...)
		// http://php.net/manual/en/language.operators.logical.php (oprerators...)
	
	chmod( $dir, 0774 );
		// http://php.net/manual/en/function.chmod.php (chmod...)
		// prefix/owner/group/everyone -->> 0777
		// 1 -->> execute rights; 2 -->> write rights; 4 -->> read rights; 1 + 2 + 4 = 7
			// echo 'Prermissions: 0777 <br><br>';
}
else
    echo "Couldn't do it. <br><br>";

$files = scandir( $dir );
	// http://php.net/manual/en/function.scandir.php (scandir...)
	// returns array of file names; [0]-->>".",[1]-->>".."
	// first file starts at [2]
		// echo 'scandir: ' . print_r($files) . '<br><br>';
	
$fileCount = count( $files );
	// http://php.net/manual/en/function.count.php (count...)
		// echo 'scandir file count: ' . $fileCount . '<br><br>';

for ($i = 2; $i < $fileCount; $i++ ){
	
	$file = $files[$i];
	// echo $file . '<br><br>';
	
	$fileLocation = $dir . $file;
		// echo $fileLocation . '<br><br>';
	
	if ( stripos( $fileLocation, '.txt' ) == true ) {
		
		$fileString = file_get_contents( $fileLocation );
			// http://php.net/manual/en/function.file-get-contents.php (file_get_contents...)
				// echo $fileString . '<br><br>';
			
		$stringCount = substr_count( $fileString, $keyword );
			// http://php.net/manual/en/function.substr-count.php (substr_count...)
				// echo $stringCount . '<br><br>';
		
			if ( $stringCount > 0 ){
			
				echo '<h3 class="search-result-heading" style="">MINUTES OF THE MEETING OF THE BOARD OF COUNTY COMMISSIONERS
							<a href="MeetingMinutes/' . str_replace( '.txt', '.pdf', $file ) . '"><img src="Assets/imgs/PDF-icon.png"></a></h3>
							<span style="text-align: right; font-size: .8em; display: block; margin: 0px 5px 0px 0px;">MONROE COUNTY, ILLINOIS</span>
							<span style="text-align: right; font-size: .8em; display: block; margin: 0px 5px 10px 0px;">AUGUST 17, 2015</span>';
					
				$offset = 0;
				
				$ii = 0;
				
					while ( $ii < $stringCount ){
							// http://php.net/manual/en/control-structures.while.php (while...)
							
						$offset = strpos( $fileString, $keyword, $offset ) + 1;
							// adding 1 to #offset to force movement though string
							
						$keywordHighlight = '<span style="background-color: #A3CEE1;">' . $keyword . '</span>';
							
						echo '...' . str_replace( $keyword, $keywordHighlight, substr( $fileString, $offset - 40, 140 ) ) . '...<br><br>';
							// http://php.net/manual/en/function.str-replace.php (str_replace...)
							// http://php.net/manual/en/function.substr.php (substr...)

						$ii++;
					};
				} else {
					
					echo '<h3 style="margin-bottom: 0px;">There were no matches found for "' . $keyword . '"</h3>';
				}
		};
		// http://php.net/manual/en/control-structures.break.php (break...)
}
	
// $pos = strpos( $fileString, $keyword );
	//http://php.net/manual/en/function.strpos.php (strpos...)

// echo substr( $fileString, strpos( $fileString, $keyword ) - 30, 60 );
	// http://php.net/manual/en/function.substr.php (substr...)


/*
	ERRORs incountered
	
	error -->> 'Parse error: syntax error, unexpected 'var' (T_VAR) in ...'
	solution -->> Keyword 'var' is only used in classes (in PHP). In the plain scope variables are automatically declared as you mention them. Just erase 'var'.
		http://stackoverflow.com/questions/17936577/php-unexpected-var-t-variable
		
	error -->> 'Parse error: syntax error, unexpected 'echo' (T_ECHO) in ...'
	solution -->> Missing ';' on previous statement.
		
	error -->> 'Parse error: syntax error, unexpected '++' (T_INC), expecting ')' in ...'
	solution -->> Missing '$' on var in line.
	
	error -->> 'file_get_contents(../../MeetingMinutes.): failed to open stream: Permission denied in ...'
	solution -->> 
		
*/
?>





















