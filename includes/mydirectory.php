<?php

class MyDirectory{

	var $handle;
	
	function read($dir){
	
		if ($this->handle = opendir($dir)) {	
		    while (false !== ($file = readdir($this->handle))) {
		        $files[] = $file;
		    }
		    
		    unset($files['0']);
		    unset($files['1']);
			sort($files);
		    closedir($this->handle);
		}	
		return $files;
	}
}


?>