<?php
//All functions for this theme


//Settings for this theme
function onepage_settings(){
	global $c, $d;
	echo "<div class='settings'>
	<h3 class='toggle'>↕ Settings ↕</h3>
	<div class='hide'>
	<div class='change border'><b>Theme</b>&nbsp;<span id='themeSelect'><select name='themeSelect' onchange='fieldSave(\"themeSelect\",this.value);'>";
	if(chdir("./themes/")){
		$dirs = glob('*', GLOB_ONLYDIR);
		foreach($dirs as $val){
			$select = ($val == $c['themeSelect']) ? ' selected' : '';
			echo '<option value="'.$val.'"'.$select.'>'.$val."</option>\n";
		}
	}
	echo "</select></span></div>
	<div class='change border'><b>Menu <small>(add a page below and <a href='javascript:location.reload(true);'>refresh</a>)</small></b><span id='menu' title='Home' class='editText'>".$c['menu']."</span></div>";
	foreach(array('title','description','keywords','copyright') as $key){
		echo "<div class='change border'><span title='".$d['default'][$key]."' id='".$key."' class='editText'>".$c[$key]."</span></div>";
	}
	echo "</div></div>";
}

//Menu for this theme
function onepage_menu(){
	global $c, $host;
	$mlist = explode("<br />\n", $c['menu']);
	?><ul>
	<?php
	foreach ($mlist as $cp){?>
			<li><a href='#<?php echo $cp; ?>'><?php echo $cp; ?></a></li>
	<?php } ?>
	</ul>
<?php
}

//Output singlepage sections
function onepage_content(){
	global $c, $d, $host;
	$mlist = explode("<br />\n", $c['menu']);
	?><div>
	<?php
	foreach ($mlist as $cp){ ?>
		<div style="padding:25px;">
			<a name="<?=$cp?>">
			<h2><?php echo $cp; ?></h2>
			<p><?php echo $d['page'][strtolower($cp)]; ?></p>
		</div>
		<a href="#top">Back to top</a>
	<?php } ?>
	</div>
<?php
}


?>