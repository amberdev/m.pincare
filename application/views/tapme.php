<?php $this->load->view('include/header');?>

<body>
<!-- Preloader -->
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>

<?php $this->load->view('include/menu');?>

 
<a href="<?php base_url();?>tapme/outlets">    
<div class="start-playing-sec">
    <img src="<?php echo base_url();?>front/images/Home1.gif" alt="">
    <div class="clear space30"></div>
    <p>Tap me to<br>start playing.</p>
</div>    
</a>
   <script type="text/javascript">
	//<![CDATA[
		$(window).on('load', function() { // makes sure the whole site is loaded 
			$('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
		});
	//]]>
</script>
</body>    
</html>    