<?
class file{
	function saveFile($filename, $data){
		$fp = fopen($filename, 'w');
		fwrite($fp, $data);
		fclose($fp);
	}
	function readFile($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
}
?>