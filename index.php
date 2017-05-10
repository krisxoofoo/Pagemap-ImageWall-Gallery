<?php
/*
	Pagemap ImageWall Web Gallery
	Copyright by Pagemap Premium Portfolios. All Rights reserved.
	Version "Retina" adapted by kris - https://xoofoo.org
*/
/* add little cache - credits: Rafael Paulino - http://www.phpclasses.org/package/5595-PHP-Cache-the-output-of-pages-into-files.html */
class cache {
	public $cache_file_name;
	public $age;
	public function __construct(){
		$this->cache_start();
		register_shutdown_function(array($this, "cache_end"), "inside");
	}
	public function __descruct(){
		$this->cache_end();
	}
	public function cache_start(){
		global $cache_file_name, $age;
		$cache_file_name = 	$_SERVER["DOCUMENT_ROOT"].$_SERVER['REQUEST_URI'] . '_cache';
		if (empty($age)){
			$age = 600;
		}
		if(file_exists($cache_file_name)){
			if (filemtime($cache_file_name) + $age > time()) {
				readfile($cache_file_name);
				unset($cache_file_name);
				exit;
			}
		}
		ob_start();
	}
	public function cache_end()
	{
		global $cache_file_name;
		if (empty($cache_file_name)){
			return;
		}
		$str = ob_get_clean();
		echo $str;
		fwrite(fopen($cache_file_name . '_tmp', "w"), $str);
		rename($cache_file_name . '_tmp',$cache_file_name);
	}
}
$cache = new cache();
// SCRIPT
error_reporting(0);
umask(0000);
if(p_getMemoryLimit() < 5242880)
	ini_set('memory_limit', 33554432);
// SETTINGS
global $set; if(empty($set)) $set = array();
$set['script version'] = '1.0';
$set['script name'] = empty($set['script name']) ? $_SERVER['SCRIPT_NAME'] : $set['script name'];
$set['script dir'] = empty($set['script dir']) ? './' : $set['script dir'];
$set['cache dir'] = 'cache/';
$set['config file'] = $set['script dir'] . 'config.ini';
$set['fallback image size'] = 800;
$set['color names'] = array('aliceblue' => '#f0f8ff', 'antiquewhite' => '#faebd7', 'aqua' => '#00ffff', 'aquamarine' => '#7fffd4', 'azure' => '#f0ffff', 'beige' => '#f5f5dc', 'bisque' => '#ffe4c4', 'black' => '#000000', 'blanchedalmond' => '#ffebcd', 'blue' => '#0000ff', 'blueviolet' => '#8a2be2', 'brown' => '#a52a2a', 'burlywood' =>  '#deb887', 'cadetblue' => '#5f9ea0', 'chartreuse' => '#7fff00', 'chocolate' => '#d2691e', 'coral' => '#ff7f50', 'cornflowerblue' => '#6495ed', 'cornsilk' => '#fff8dc', 'crimson' => '#dc143c', 'cyan' => '#00ffff', 'darkblue' => '#00008b', 'darkcyan' => '#008b8b', 'darkgoldenrod' => '#b8860b', 'darkgray' => '#a9a9a9', 'darkgreen' => '#006400', 'darkkhaki' => '#bdb76b', 'darkmagenta' => '#8b008b', 'darkolivegreen' => '#556b2f', 'darkorange' => '#ff8c00', 'darkorchid' => '#9932cc', 'darkred' => '#8b0000', 'darksalmon' => '#e9967a', 'darkseagreen' => '#8fbc8f', 'darkslateblue' => '#483d8b', 'darkslategray' => '#2f4f4f', 'darkturquoise' => '#00ced1', 'darkviolet' => '#9400d3', 'deeppink' => '#ff1493', 'deepskyblue' => '#00bfff', 'dimgray' => '#696969', 'dodgerblue' => '#1e90ff', 'firebrick' => '#b22222', 'floralwhite' => '#fffaf0', 'forestgreen' => '#228b22', 'fuchsia' => '#ff00ff', 'gainsboro' => '#dcdcdc', 'ghostwhite' => '#f8f8ff', 'gold' => '#ffd700', 'goldenrod' => '#daa520', 'gray' => '#808080', 'green' => '#008000', 'greenyellow' => '#adff2f', 'honeydew' => '#f0fff0', 'hotpink' => '#ff69b4', 'indianred ' => '#cd5c5c', 'indigo ' => '#4b0082', 'ivory' => '#fffff0', 'khaki' => '#f0e68c', 'lavender' => '#e6e6fa', 'lavenderblush' => '#fff0f5', 'lawngreen' => '#7cfc00', 'lemonchiffon' => '#fffacd', 'lightblue' => '#add8e6', 'lightcoral' => '#f08080', 'lightcyan' => '#e0ffff', 'lightgoldenrodyellow' => '#fafad2', 'lightgrey' => '#d3d3d3', 'lightgreen' => '#90ee90', 'lightpink' => '#ffb6c1', 'lightsalmon' => '#ffa07a', 'lightseagreen' => '#20b2aa', 'lightskyblue' => '#87cefa', 'lightslategray' => '#778899', 'lightsteelblue' => '#b0c4de', 'lightyellow' => '#ffffe0', 'lime' => '#00ff00', 'limegreen' => '#32cd32', 'linen' => '#faf0e6', 'magenta' => '#ff00ff', 'maroon' => '#800000', 'mediumaquamarine' => '#66cdaa', 'mediumblue' => '#0000cd', 'mediumorchid' => '#ba55d3', 'mediumpurple' => '#9370d8', 'mediumseagreen' => '#3cb371', 'mediumslateblue' => '#7b68ee', 'mediumspringgreen' => '#00fa9a', 'mediumturquoise' => '#48d1cc', 'mediumvioletred' => '#c71585', 'midnightblue' => '#191970', 'mintcream' => '#f5fffa', 'mistyrose' => '#ffe4e1', 'moccasin' => '#ffe4b5', 'navajowhite' => '#ffdead', 'navy' => '#000080', 'oldlace' => '#fdf5e6', 'olive' => '#808000', 'olivedrab' => '#6b8e23', 'orange' => '#ffa500', 'orangered' => '#ff4500', 'orchid' => '#da70d6', 'palegoldenrod' => '#eee8aa', 'palegreen' => '#98fb98', 'paleturquoise' => '#afeeee', 'palevioletred' => '#d87093', 'papayawhip' => '#ffefd5', 'peachpuff' => '#ffdab9', 'peru' => '#cd853f', 'pink' => '#ffc0cb', 'plum' => '#dda0dd', 'powderblue' => '#b0e0e6', 'purple' => '#800080', 'red' => '#ff0000', 'rosybrown' => '#bc8f8f', 'royalblue' => '#4169e1', 'saddlebrown' => '#8b4513', 'salmon' => '#fa8072', 'sandybrown' => '#f4a460', 'seagreen' =>  '#2e8b57', 'seashell' => '#fff5ee', 'sienna' => '#a0522d', 'silver' => '#c0c0c0', 'skyblue' => '#87ceeb', 'slateblue' => '#6a5acd', 'slategray' => '#708090', 'snow' => '#fffafa', 'springgreen' => '#00ff7f', 'steelblue' => '#4682b4', 'tan' => '#d2b48c', 'teal' => '#008080', 'thistle' => '#d8bfd8', 'tomato' => '#ff6347', 'turquoise' => '#40e0d0', 'violet' => '#ee82ee', 'wheat' => '#f5deb3', 'white' => '#ffffff', 'whitesmoke' => '#f5f5f5', 'yellow' => '#ffff00', 'yellowgreen' => '#9acd32');
// GET CONFIG
$config = array();
$config['Author'] = '';
$config['Gallery Title'] = 'My gallery';
$config['Gallery Description'] = 'Pagemap ImageWall by Pagemap Premium Portfolios';
$config['Meta Keywords'] = 'gallery, photos, holidays';
$config['Thumbnail Cropped'] = 'on';
$config['Thumbnail Quality'] = 80;
$config['Thumbnail Size'] = 'normal';
$config['Thumbnail Background'] = 'black';
$config['Controls Image'] = 'black';
$config['Image Size'] = '';
$config['Sort'] = 'normal';
$config['Embedded Script'] = 'off';
$config['Other JS'] = '';
$config['ImageWall Width'] = 'auto';
$config['Header Image'] = '';
$config['Background'] = 'white';
$config['Header Color'] = 'silver';
$config['Content Color'] = 'black';
$config['Footer Color'] = 'silver';
$config['Custom CSS'] = '';
$config['Custom FileCSS'] = '';
$config['Custom HTML'] = '';
$config['Home Page'] = 'localhost';
$config['Contact'] = '';
$config['Imprint'] = '';
$config['Images Dir'] = '';
$config['Images List'] = '';
$config['Exclude Images'] = '';
$config['Disqus Shortname'] = '';
$config['GoogleAnalytics Account'] = '';
$config['Per Page'] = '24';
$set['image overlay'] = 'R0lGODlhIAAgAJEAAAAAADMzMyEhIQAAACH5BAQUAP8ALAAAAAAgACAAAAJvTACGmtfrGBMCUVvB1Xn7DIXPKEUmhnLptwql+JKnSrN1hyPwHPeODczdfLviKNhK0oxEmQh5U1Ka1Bn0KmTytk8htlXVdqXess6JDkfXWLX6y86muXOyfUh3/8xxpbiOBteWRzjWd7jxp3cnKFAAADs=';
// SET CONFIG
if(is_file($set['config file']) && is_readable($set['config file'])) {
	// Get config from Config File
	$set['config file contents'] =  file_get_contents($set['config file']);
	preg_match_all("/\[(.*):(.*)\]/U", $set['config file contents'], $set['config file variables']);
	foreach($set['config file variables'][1] as $position => $variable) if(!empty($variable))
		$config[trim($variable)] = isset($set['config file variables'][2][$position]) ? trim($set['config file variables'][2][$position]) : '';
} elseif(is_writeable($set['script dir'])) {
	// Create Config File if not exists
	$set['open config file'] = fopen($set['config file'], 'w');
	foreach($config as $variable => $value) fwrite($set['open config file'], '[' . $variable . ': ' . $value . ']' . "\r\n");
}
// FUNCTIONS
function p_encodeEmail($string) {
	$emails = array();
	preg_match_all('/\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,6}/i', $string, $emails);
	foreach((array) $emails[0] as $email) {
		$encoded_string = '';
		$arrCharacters = str_split($email);
		foreach ($arrCharacters as $strCharacter)
			$encoded_string .= sprintf('&#%s;', ord($strCharacter));
		$string = str_replace($email, $encoded_string, $string);
	}
	return str_replace('mailto:', '&#109;&#97;&#105;&#108;&#116;&#111;&#58;', $string);
}
function p_addHTTP($url) { return !empty($url) && substr($url, 0, 7) != 'http://' ? 'http://' . $url : $url;}
function p_getThumbnailSize($size) {
	switch($size) {
		case 'small' : $size = 90; break;
		case 'normal' : default : $size = 150; break;
		case 'large' : $size = 225; break;
	}
	return $size;
}
function p_html2rgb($color) {
	if($color[0] == '#') $color = substr($color, 1);
	if(strlen($color) == 6) list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
		elseif(strlen($color) == 3) list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
	else return false;
	$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
	return array($r, $g, $b);
}
function p_message($message) { if(!defined('p_error')) define('p_error', $message);}
function p_emptyCache($silent = false) {
	global $set;
	if(is_dir($set['cache dir'])) {
		if(is_readable($set['cache dir'])) {
			$cache_open = opendir($set['cache dir']);	
			while($item = readdir($cache_open)) if(is_file($set['cache dir'] . $item)) if(is_writeable($set['cache dir'] . $item))
				unlink($set['cache dir'] . $item);
			elseif($silent == true) p_message('One or more files could not be deleted. It seems that these files are write protected. Please try to change file permissions via FTP.');
		} elseif($silent == true)
			p_message('The cache directory is not readable. Please try to change directory permissions via FTP.');
		if(is_writeable($set['cache dir'])) rmdir($set['cache dir']);
			elseif($silent == true) p_message('The cache directory is write protected. Please try to change directory permissions via FTP.');
	}
}
function p_getMemoryLimit() {
	$memory_limit = ini_get('memory_limit');
	if(is_numeric($memory_limit)) {
		return $value;
	} else {
		$memory_limit_length = strlen($memory_limit);
		$qty = substr($memory_limit, 0, $memory_limit_length - 1);
		$unit = strtolower(substr($memory_limit, $memory_limit_length - 1));	
		switch($unit) {
			case 'k': $qty *= 1024; break;
			case 'm': $qty *= 1048576; break;
			case 'g': $qty *= 1073741824; break;
		}
		return $qty;
	}
}
/* add page navigation - credits: V Song - https://code.google.com/p/pagemap-imagewall-enhance/ */
function mulit($count, $page, $perpage) {
	global $dir;
	$last = $allpage = ceil($count / $perpage);
	if ($page > $allpage) {
		$page = $allpage;    
	}
	if ($allpage == 0) {
		return false;    
	}
	$i = 1;
	$pager = "<nav id='mulit'><a class='bulbetop' href='?dir=$dir&page=1' title='First page'><em>First</em></a>";
	while($allpage) {
		$class = '';
		if ($i == $page) {
			$class = ' class="current"'; 
		}
		if ($dir) {
			$pager .= "<a href='?dir=$dir&page=$i' ><em$class>";
		} else {
			$pager .= "<a class='bulbetop' href='?page=$i' title='Go to page $i'><em$class>";    
		}
		$pager .= "$i";
		$pager .= "</em></a>";
		$i ++;
		$allpage --;
	}
	$next = $page + 1;
	$pager .= "<a class='bulbetop' href='?dir=$dir&page=$last' title='Last page'><em>Last</em></a>";
	$pager .= "<a class='bulbetop' href='?dir=$dir&page=$next' title='Next page'><em>NEXT</em></a></nav>";
	return $pager;
}
// DATA CHECK
// PHP
if(phpversion() < 4) p_message('<strong>System error:</strong>: Pagemap ImageWall needs at least PHP 4.01. Your current installed PHP version is ' . phpversion());
if(!extension_loaded('gd')) p_message('<strong>System error:</strong> Pagemap ImageWall needs the PHP extension GD-LIB for rendering images. Contact your hosting provider for information how to enable the extension.');
// Images Dir
$config['Images Dir'] = empty($config['Images Dir']) ? $set['script dir'] : trim($config['Images Dir'], '/') . '/';
if(!is_dir($config['Images Dir'])) p_message('Image directory <strong>' . $config['Images Dir'] . '</strong> cannot be found. Please check your configuration.');
// Convert Contact
$config['Contact'] = strpos($config['Contact'], '@') === false
	? p_addHTTP($config['Contact'])
	: p_encodeEmail('mailto:' . $config['Contact']);
// Validate URL's
$config['Home Page'] = p_addHTTP($config['Home Page']);
$config['Imprint'] = p_addHTTP($config['Imprint']);
// Exlude Images
$set['exclude images'] = array(	$config['Header Image']);
$set['exclude images list'] = explode(',', $config['Exclude Images']);
foreach($set['exclude images list'] as $item) $set['exclude images'][] = trim($item);
// Thumbnail Background Color
if(isset($set['color names'][strtolower($config['Thumbnail Background'])])) $config['Thumbnail Background'] = $set['color names'][strtolower($config['Thumbnail Background'])];
$config['Thumbnail Background'] = p_html2rgb($config['Thumbnail Background']) ? p_html2rgb($config['Thumbnail Background']) : array(0, 0, 0);
// Custom HTML
if(!empty($config['Custom HTML']) && is_file($config['Custom HTML'])) $config['Custom HTML'] = file_get_contents($config['Custom HTML']);
// OUTPUT
// Thumbnail
if(isset($_GET['thumbnail']) && is_file($_GET['thumbnail'])) {
	$thumbnail = array();
	$thumbnail['image data'] = getimagesize($_GET['thumbnail']);
	$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp');
	$thumbnail['resized file name'] = substr($_GET['thumbnail'], strrpos($_GET['thumbnail'], '/') + 1);
	$thumbnail['resized file name'] = substr($thumbnail['resized file name'], 0, strrpos($thumbnail['resized file name'], '.')) . '.' . $types[$thumbnail['image data'][2]];
	$thumbnail['resized width'] = p_getThumbnailSize($config['Thumbnail Size']);
	$thumbnail['resized height'] = p_getThumbnailSize($config['Thumbnail Size']);
	if($config['Thumbnail Cropped'] == 'on') {
		if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
			else $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
	} else {
		if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
			else $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
	}
	header('content-type: image/' . $types[$thumbnail['image data'][2]]);
	if(!is_file($set['cache dir'] . $thumbnail['resized file name'])) {
		if(filesize($_GET['thumbnail']) > p_getMemoryLimit() && exif_thumbnail($_GET['thumbnail']) == false) {
			$thumbnail['exif image'] = exif_thumbnail($_GET['thumbnail'], $thumbnail['image data'][0], $thumbnail['image data'][1], $thumbnail['image data'][2]);
			$thumbnail['original image'] = imagecreatefromstring($thumbnail['exif image']);
		} else {
			$thumbnail['original image'] = call_user_func('imagecreatefrom' . $types[$thumbnail['image data'][2]], $_GET['thumbnail']);
		}
		$thumbnail['resized image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
		imagecopyresampled($thumbnail['resized image'], $thumbnail['original image'], 0, 0, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], $thumbnail['image data'][0], $thumbnail['image data'][1]);
		if($config['Thumbnail Cropped'] == 'on') {
			$thumbnail['thumbnail image'] = $thumbnail['resized image'];
		} else {
			$thumbnail['thumbnail image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
			$background_color = imagecolorallocate($thumbnail['thumbnail image'], $config['Thumbnail Background'][0], $config['Thumbnail Background'][1], $config['Thumbnail Background'][2]);
			imagefill($thumbnail['thumbnail image'], 0, 0, $background_color);
			imagecopymerge($thumbnail['thumbnail image'], $thumbnail['resized image'], (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized width']) / 2, (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized height']) / 2, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], 100);
		}
		if($types[$thumbnail['image data'][2]] != 'jpeg') $config['Thumbnail Quality'] = '';
		if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], $set['cache dir'] . $thumbnail['resized file name'], $config['Thumbnail Quality']);
		call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], false, $config['Thumbnail Quality']);
		imagedestroy($thumbnail['original image']);
		imagedestroy($thumbnail['resized image']);
		imagedestroy($thumbnail['thumbnail image']);
	} else
		readfile($set['cache dir'] . $thumbnail['resized file name']);
	exit();
}
// Resized image
if(isset($_GET['image']) && is_file($_GET['image'])) {
	$image['image data'] = getimagesize($_GET['image']);
	$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp');
	header('content-type: image/' . $types[$image['image data'][2]]);
	$image['resized file name'] = substr($_GET['image'], strrpos($_GET['image'], '/') + 1);
	$image['resized file name'] = substr($image['resized file name'], 0, strrpos($image['resized file name'], '.')) . '_resized' . '.' . $types[$image['image data'][2]];
	if(empty($config['Image Size'])) $config['Image Size'] = $set['fallback image size'];
	$image['resize'] = ($image['image data'][0] > $config['Image Size'] || $image['image data'][1] > $config['Image Size']) ? 1 : 0;
	if($image['resize'] == 1 && !is_file($set['cache dir'] . $image['resized file name'])) {
		$image['resized width'] = $config['Image Size'];
		$image['resized height'] = $config['Image Size'];
		if($image['image data'][0] > $image['image data'][1]) $image['resized height'] = floor($config['Image Size'] * $image['image data'][1] / $image['image data'][0]);
			else $image['resized width'] = floor($config['Image Size'] * $image['image data'][0] / $image['image data'][1]);
		$image['original'] = call_user_func('imagecreatefrom' . $types[$image['image data'][2]], $_GET['image']);
		$image['resized'] = imagecreatetruecolor($image['resized width'], $image['resized height']);
		imagecopyresampled($image['resized'], $image['original'], 0, 0, 0, 0, $image['resized width'], $image['resized height'], $image['image data'][0], $image['image data'][1]);
		if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$image['image data'][2]], $image['resized'], $set['cache dir'] . $image['resized file name'], 90);
		call_user_func('image' . $types[$image['image data'][2]], $image['resized'], false, 90);
		imagedestroy($image['original']);
		imagedestroy($image['resized']);
	} else
		readfile($image['resize'] == 1 ? $set['cache dir'] . $image['resized file name'] : $_GET['image']);
	exit();
}
// Layout files
if(isset($_GET['symbol'])) {
	header('content-type: image/gif');
	$set['symbol name'] = 'image ' . $_GET['symbol'];
	if(isset($set[$set['symbol name']])) echo base64_decode($set[$set['symbol name']]);
	exit();
}
// CACHE
if(is_dir($set['cache dir']) && is_file($set['config file']) && filemtime($set['cache dir']) < filemtime($set['config file'])) p_emptyCache(true);
if(!is_dir($set['cache dir']) && is_writeable($config['Images Dir'])) mkdir($set['cache dir'], 0777);
// IMAGE LIST
// Get images
if(empty($config['Images List'])) {
	// From dir
	$set['images dir open'] = opendir($config['Images Dir']);
	$images = array();
	while($item = readdir($set['images dir open'])) {
		if(is_file($config['Images Dir'] . $item) && !in_array($item, $set['exclude images'])) {
			$imagedata = getimagesize($config['Images Dir'] . $item);
			if($imagedata[2] == 1 || $imagedata[2] == 2 || $imagedata[2] == 3) $images[] = $item;
		}
	}
	closedir($set['images dir open']);
} else {
	// From list
	if(!stristr($config['Images List'], ',') && !is_file($config['Images List'])) {
		p_message('Your image list respectively a file with name <strong>' . $config['Images List'] . '</strong> cannot be found.');
		$config['Images List'] = '';
	}
	if(stristr($config['Images List'], '.txt'))
		$config['Images List'] = is_file($config['Images List']) ? file_get_contents($config['Images List']) : '';
	$images = empty($config['Images List']) ? array() : explode(',', $config['Images List']);
	for($i = 0; $i < count($images); $i++) $images[$i] = trim($images[$i]);
	if(count($images) == 0) p_message('<strong>No images found.</strong><br>Your file list is empty.');
}	
// Set Page
$page = max(1, intval($_GET['page']));
$allpage = ceil(count($images) / $config['Per Page']);
if ($page > $allpage) {
	$page = $allpage;    
}
$start = ($page - 1) * $config['Per Page'];
$mulit = mulit(count($images), $page, $config['Per Page']);
$images = array_slice($images, $start, $config['Per Page']);
// Sort images
switch($config['Sort']) {
	case 'normal' : sort($images); break;
	case 'reverse' : rsort($images); break;
	case 'shuffle' : shuffle($images); break;
}
// Get number of existing files
for($i = 0; $i < count($images); $i++) if(is_file($config['Images Dir'] . $images[$i])) break;
if($i == count($images)) {
	p_message('<strong>No images found.</strong><br>The specified file(s) in Images List cannot be found.');
	$images = array();
}
// Get number of images
$number_of_images = count($images);
if($number_of_images == 0) p_message('<strong>No images found.</strong><br>Put some images in this folder or use the <strong>[Images List: ]</strong> tag in <strong>' . $set['config file'] . '</strong> for a custom list (comma separated).');
// UNINSTALL
if(basename($_SERVER['PHP_SELF']) == 'uninstall.php') {
	$images = array();
	$number_of_images = 0;
	p_emptyCache(false);
	if(is_file($set['config file']) && is_writeable($set['config file'])) unlink($set['config file']);
	if(!is_dir($set['cache dir']) && !is_file($set['config file'])) p_message('<strong>Uninstall report:</strong> The cache directory and the config file were deleted successfully. You can now delete this file via FTP.');
	if(!is_dir($set['cache dir']) && is_file($set['config file'])) p_message('<strong>Uninstall report:</strong> The cache directory was deleted successfully. You can now delete this and all related files via FTP.');
}
// GALLERY
// Send header
if($config['Embedded Script'] == 'off' || headers_sent() == false) header('content-type: text/html; charset=utf-8');
?>
<?php if($config['Embedded Script'] == 'off') { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="author" content="<?php echo strip_tags($config['Author']); ?>" />
	<meta name="description" content="<?php echo strip_tags($config['Gallery Description']); ?>" />
	<meta name="generator" content="Pagemap ImageWall" />
	<meta name="keywords" content="<?php echo strip_tags($config['Meta Keywords']); ?>">
	<meta name="robots" content="all" />
	<title><?php echo strip_tags($config['Gallery Title']); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
	<link rel="start" title="Home Page" href="<?php echo $config['Home Page']; ?>" />
	<link rel="help" title="Pagemap Premium Portfolios" href="http://getpagemap.com/pagemap-imagewall/" />
	<style type="text/css">
		html { height: 100%;}
		* { margin: 0; padding: 0; list-style: none; -moz-box-sizing: border-box; box-sizing: border-box;}
		article, aside, figure, footer, header, hgroup, nav, section {  display:block;}
		body { margin: 15px 25px; background: <?php echo $config['Background']; ?>; text-align: center; font: 12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color: <?php echo $config['Content Color']; ?>; }
		header h1 {margin: 20px;text-align: center;}
		header h1 span {line-height:22px;font-size: 24px;display: block; padding-top:20px; font-weight: 400;text-shadow: 0 1px 1px #fff;text-decoration: none;color: <?php echo $config['Header Color']; ?>;}
		header h1 span a { text-decoration: none;color: <?php echo $config['Header Color']; ?>;}
		footer { margin-top: 15px; margin-bottom: 25px;height:80px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 11px; font-style: italic; text-align:center; line-height:1.6em; }
		footer nav {font-size: 14px; padding: .5em 0; font-style: normal;}
		footer, footer a { text-decoration: none; color: <?php echo $config['Footer Color']; ?>; }
	</style>
<?php } ?>
	<style type="text/css">
		/* GALLERY */
		.icon-grid,.icon-arrow-left,.icon-arrow-right,.icon-fullscreen-exit,.icon-fullscreen {background-image: url(img/controls-<?php echo $config['Controls Image']; ?>.png);background-repeat: no-repeat}
		p.error { width: 550px; margin: 50px auto; font-size: 14px; line-height:1.5em; text-align:center;}
		#imagewall { max-width: <?php echo $config['ImageWall Width']; ?>; margin: 0 auto;}
		#gallery-container .item img {width: <?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>px; height: <?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>px; box-shadow: 0 0 3px #555; border-radius: 4px;}
		#mulit li {list-style:none;}
		#mulit {font-size:12px;text-align:center;padding: 0 0 10px 0;margin: 20px 0 10px 0;}
		#mulit em {border: solid 1px #ccc;padding: 2px 7px;margin: 0 3px 0 0;}
		#mulit .current {border: solid 1px #7dc0d1;color:#7dc0d1;}
		#mulit a {color:#999;text-decoration:none;}
	</style>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/tiptip.css">
	<?php if(!empty($config['Custom FileCSS'])) { ?>
		<link rel="stylesheet" href="<?php echo $config['Custom FileCSS']; ?>">
	<?php } ?>
	<style type="text/css">
		<?php echo $config['Custom CSS']; ?>
	</style>
<?php if($config['Embedded Script'] == 'off') { ?>
</head>
<body>
<?php } ?>
<div id="imagewall">
<?php if($config['Embedded Script'] == 'off') { ?>
	<?php if(!empty($config['Header Image'])) { ?>
		<header>
			<h1><?php if(!empty($config['Home Page'])) { ?><a class="bulbe" href="<?php echo $config['Home Page']; ?>" ><?php } ?><img src="<?php echo $config['Header Image']; ?>" alt="Header Image" /><?php if(!empty($config['Home Page'])) { ?></a><?php } ?>
			<span>
			<?php if(!empty($config['Gallery Title'])) { ?><?php if(!empty($config['Home Page'])) { ?><a class="bulbe" href="<?php echo $config['Home Page']; ?>" title="<?php echo $config['Gallery Description']; ?>"><?php } ?><?php echo $config['Gallery Title']; ?><?php if(!empty($config['Home Page'])) { ?></a><?php } ?><?php } ?>
			</span></h1>
		</header>
	<?php } ?>
<?php } ?>
	<section id="imagewall-container">
	<?php if(defined('p_error')) { ?>
		<p class="error"><?php echo constant('p_error'); ?></p>
	<?php } ?>
	<div id="gallery-container">
	<ul class="items--small">
	<?php for($i = 0; $i < $number_of_images; $i++) { ?>
	<?php $image_title = str_replace('_', ' ', substr($images[$i], 0, strrpos($images[$i], '.'))); ?>
	<li class="item"><a class="bulbe" href="#" title="<?php echo $image_title; ?>"><img src="<?php echo $set['script name']; ?>?thumbnail=<?php echo $config['Images Dir'] . $images[$i]; ?>" alt="<?php echo $image_title; ?>"/></a></li>
	<?php } ?>
	</ul>
	<ul class="items--big">
	<?php for($i = 0; $i < $number_of_images; $i++) { ?>	
	<?php $image_title = str_replace('_', ' ', substr($images[$i], 0, strrpos($images[$i], '.'))); ?>
	<li class="item--big"><a href="#"><figure><img src="<?php echo (empty($config['Image Size']) ? '' : $set['script name'] . '?image=') . $config['Images Dir'] . $images[$i]; ?>" alt="<?php echo $image_title; ?>" /></figure></a></li><?php } ?>	
	</ul>
	</div>
	<div class="controls">
		<span class="control icon-arrow-left" data-direction="previous"></span> 
		<span class="control icon-arrow-right" data-direction="next"></span> 
		<span class="grid icon-grid"></span>
		<span class="fs-toggle icon-fullscreen"></span>
	</div>
		<?php if($mulit) echo $mulit;?>
		<?php if(!empty($config['Disqus Shortname'])) { ?>
		<div id="disqus_thread"></div>
		<script>
			var disqus_shortname = '<?php echo $config['Disqus Shortname']; ?>';
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<p><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">Comments powered by <span class="logo-disqus">Disqus</span></a></p>
		<?php } ?>
	</section>
	<?php echo $config['Custom HTML']; ?>
	
<?php if($config['Embedded Script'] == 'off') { ?>
	<footer>
		<nav><?php if(!empty($config['Home Page'])) { ?><a class="bulbe" href="<?php echo $config['Home Page']; ?>" title="Go to the home page">Home</a><?php } ?><?php if(!empty($config['Contact'])) { ?> • <a class="bulbe" href="<?php echo $config['Contact']; ?>" title="Contact us">Contact</a><?php } ?><?php if(!empty($config['Imprint'])) { ?> • <a class="bulbe" href="<?php echo $config['Imprint']; ?>" title="Imprint this page">Imprint</a> <?php } ?></nav><?php if(!empty($config['Author'])) { ?><p>Photos by <strong><?php echo $config['Author']; ?></strong> - Copyright © 2017 - All rights reserved.</p><?php } ?>
		<p>Powered by <strong>Pagemap ImageWall Gallery</strong> adapted by <a class="bulbe" href="https://xoofoo.org/" title="XooFoo Websites"><strong>XooFoo</strong></a></p>
	</footer>
<?php } ?>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery-tiptip.min.js"></script>
<script>
$(document).ready(function(){
  $('#gallery-container').sGallery({
	fullScreenEnabled: true
  });
});
/* Init tooltip */
jQuery(function(){
	jQuery(".bulbe").tipTip();
	jQuery(".bulberight").tipTip({maxWidth: "auto", defaultPosition: "right"});
	jQuery(".bulbeleft").tipTip({maxWidth: "auto", defaultPosition: "left"});
	jQuery(".bulbetop").tipTip({maxWidth: "auto", defaultPosition: "top"});
});	
</script>

<?php if(!empty($config['Other JS'])) { ?><script src="<?php echo $config['Other JS']; ?>"></script><?php } ?>

<?php if(!empty($config['GoogleAnalytics Account'])) { ?>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $config['GoogleAnalytics Account']; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php } ?>
<?php if($config['Embedded Script'] == 'off') { ?></body></html><?php } else $set = null; ?>