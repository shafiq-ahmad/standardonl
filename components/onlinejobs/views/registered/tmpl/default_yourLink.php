<?php
defined('_MEXEC') or die ('Restricted Access');

$host=$_SERVER['HTTP_HOST'];
$url=$_SERVER['REQUEST_URI'];
$url_parts=explode('?',$url);
array_pop($url_parts);
$url=implode('?',$url_parts);
$host .= $url;
$link="{$host}?option=onlinejobs&view=register&referal={$user_id}";
//echo $link;
?>

	<div id="main-wrapper">
		<div id="content"><br />
			<h2><span>Your Refferal Links</span></h2>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table">
					<div class="cleaner"></div>
					<?php $counter=0; $class = ''; ?>

					
<form action="index.php?option=onlinejobs&view=registered&task=withdraw" name="form-withdraw" method="post" >
	<div class="">
		<?php 
			//$link="index.php?option=onlinejobs&view=register&referal={$user_id}";
		?>
		<p><a href="http://<?php echo $link; ?>" target="_blank">http://<?php echo $link; ?></a></p>

	</div>				
</form>
					
					

					
			</div>
        </div>

	</div>

</div>