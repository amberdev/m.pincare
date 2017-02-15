<?php $this->load->view('include/header');


?>
<body>

<?php $this->load->view('include/menu');?>

<div class="outlet-pins">

<?php if(!empty($data_pins)){?>
	<?php foreach($data_pins as $pins):?>
    
	<div class="outlet-pins-row">
	<p><?php echo $pins['outlet_name']?><br><?php echo $pins['address'];?></p>
	<div class="outlet-profile-left"><img src="http://<?php echo $pins['logo'];?>" alt=""></div>
	<div class="outlet-pins-right"><?php echo $pins['numer'];?><br>Pins</div>        
	</div>

<?php endforeach;?>
<?php }else{?>
	<div class="outlet-pins-row" style="color:#ff0000;">
	<br><br><br><b>No tranding pins found!!</b>
	</div>

<?php }?>


    
</div>  
        
  
</body>    
</html>    