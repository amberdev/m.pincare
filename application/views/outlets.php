<?php $this->load->view('include/header');


?>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<?php $this->load->view('include/menu');?>   
    
<div class="outlet-listing-sec">


<?php 
if(!empty($data_outlets)):
        foreach($data_outlets as $outlets):?>
<a href="<?php echo base_url();?>story/index/<?php echo base64_encode($outlets['place_id']);?>/<?php echo base64_encode($outlets['id']);?>">
<div class="outlet-listing-row">
        <div class="outlet-left-image"><img src="http://<?php echo $outlets['logo'];?>" alt=""></div>
        <div class="outlet-right-text">
            <label><b><?php echo $outlets['outlet_name'];?></b><br><?php echo $outlets['address'];?></label>
            <p>Giving back 100 Rs. for every pin!</p>
        </div>
    </div>
</a>

<?php endforeach; endif;?>

    
</div>   

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