<style type="text/css">
div.header_tabs_divs{
    font-size: 16px;
    font-weight: bold;
    display: inline-block;
    color: #4b4443;
    border-radius: 5px;
    padding:10px 10px;
   /* background-color: #90e8ff; */
}
div.header_tabs_divs_active{
    display: inline-block;
    color: #000000;
    font-weight: bold;
    border-radius: 5px;
    padding:10px 10px;
    background-color: #90e8ff;
}
</style>
<?php
class tab{
	function create($title){
		echo "<a href='index.php?op=".$title."'>";
		echo "<div ";
		if($title!="home"){
			if(isset($_GET['op']) && $_GET['op'] == $title){
				echo 'class="header_tabs_divs_active"';
			} else {
				echo 'class="header_tabs_divs"';
			} 
		} else {
			//special case for "home" tab
			if(!isset($_GET['op']) || $_GET['op'] == $title || $_GET['op'] == null){
				echo 'class="header_tabs_divs_active"';
			} else {
				echo 'class="header_tabs_divs"';
			}
		}
		echo ">".$title."</div></a>";
	}
}
$tab = new tab;
?>