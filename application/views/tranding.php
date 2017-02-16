<?php $this->load->view('include/header');


?>
<body>
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>

<?php $this->load->view('include/menu');?>

<div class="outlet-pins">

<?php if(!empty($data_pins)){?>
	<?php foreach($data_pins as $pins):?>
    
	<div class="outlet-pins-row">
	<b><p><?php echo $pins['outlet_name']?><br><?php echo $pins['address'];?></p></b>
	<div class="outlet-profile-left"><img src="http://<?php echo $pins['logo'];?>" alt=""></div>
	<div class="outlet-pins-right"><b><?php echo $pins['numer'];?><br>Pins</b></div>        
	</div>

<?php endforeach;?>
<?php }else{?>
	<div class="outlet-pins-row" style="color:#ff0000;">
	<br><br><br><b>No tranding pins found!!</b>
	</div>

<?php }?>


    
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