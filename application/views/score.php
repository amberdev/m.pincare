<?php $this->load->view('include/header');


?>

<body>

<?php $this->load->view('include/menu');?>

<div class="image-pins">

<?php if(!empty($pins)){?>
	<?php foreach($pins as $pin): ?>

    
<div class="image-pins-row">
<div class="profile-left"><img src="<?php echo $pin['friend_photo'];?>" alt=""></div>
<div class="image-pins-right"><b><?php echo $pin['count'];?><br>Pins</b></div>        
</div>
<?php endforeach;?>
<?php }else{?><div class="outlet-pins-row" style="color:#ff0000;">
	<br><br><br><b>No friends have pins!!</b>
	</div> <?php }?>
    
</div>  
        
  
</body>    
</html>    