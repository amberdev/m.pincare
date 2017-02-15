 <?php $this->load->view('include/header');

?>
<body>

<!-- Preloader -->
 <div id="preloader">
    <div id="status">&nbsp;</div>
</div>



<!--<?php $this->load->view('include/menu');?>   -->

<div class="image-section">
    
    <h1><?php echo $data_story[0]['title'];?></h1>
    <img src="http://<?php echo $data_story[0]['story_image'];?>" alt="">
    <p><?php echo $data_story[0]['description'];

    $story_id=$data_story[0]['id'];
    ?></p>
    
    <div class="clear space10"></div>
    
    <div class="clear space20"></div>
    <div class="controller">
        <button type="button" name="" value="" class="left-arrow"></button>
        <?php 
        if(!isset($place_id) && !isset($outlet_id)){?>

                <p style="cursor: pointer;" onclick="shareit('<?php echo $data_story[0]['title'];?>','link','http://<?php echo $data_story[0]["story_image"];?>','caption','<?php echo trim(addslashes($data_story[0]["description"]));?>');">Share</p>

           <?php }else{?>

        <p style="cursor: pointer;" onclick="checkin('<?php echo @$place_id;?>','<?php echo @$outlet_id;?>','<?php echo @$user_fb_id;?>','<?php echo @$story_id;?>');">CHECK-IN</p>
        <?php }?>

        <button type="button" name="" value="" class="right-arrow"></button>
    </div>
    
    <div class="clear space10"></div>
    <div class="clear"></div>
    <a href="<?php echo base_url();?>tapme">Go Back</a>
    
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