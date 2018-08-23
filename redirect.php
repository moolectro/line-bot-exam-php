<?php 
$json = file_get_contents
  ('https://api.instagram.com/v1/tags/Thailand/media/recent?client_id=09aa1fde3b7f4540823356977a348893'); 
$decode = json_decode($json, true); 
?>
<?php 
    foreach ($decode['data'] as $data) { 
       $thumbnail = $data['images']['low_resolution']['url']; 
		?>
		<div align="left"> 
       	 <img src="<?php echo $thumbnail ?>" alt="" align="left" />
		</div>
<?php }?> 
