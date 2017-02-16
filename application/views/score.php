<?php $this->load->view('include/header');


?>

<body>
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
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
         <script type="text/javascript">
	//<![CDATA[
		$(window).on('load', function() { // makes sure the whole site is loaded 
			$('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
		})
	//]]>
</script> 
  
</body>    
</html>    