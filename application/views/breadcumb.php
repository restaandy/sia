<h1>
 <?php echo $title1; ?>
 <small><?php echo $title2; ?></small>
</h1>
<ol class="breadcrumb">
<?php
	foreach ($list as $key) {
		?>
		<li><?php echo $key; ?></li>
		<?php
	}
?>  
</ol>