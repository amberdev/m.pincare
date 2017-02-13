<?php $this->load->view('include/header');

?>
<body>

<!-- Preloader -->
<!-- <div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<?php $this->load->view('include/menu');?>   -->

<div class="image-section">
    
    <h1><?php echo $data_story[0]['title'];?></h1>
    <img src="http://<?php echo $data_story[0]['story_image'];?>" alt="">
    <p><?php echo $data_story[0]['description'];?></p>
    
    <div class="clear space10"></div>
    
    <div class="clear space20"></div>
    <div class="controller">
        <button type="button" name="" value="" class="left-arrow"></button>
        <p style="cursor: pointer;" onclick="checkin('<?php echo $place_id;?>','<?php echo $outlet_id;?>','242456449539019');">CHECK-IN</p>
        <button type="button" name="" value="" class="right-arrow"></button>
    </div>
    
    <div class="clear space10"></div>
    <div class="clear"></div>
    <a href="<?php echo base_url();?>tapme">Go Back</a>
    
</div>    
  
</body>    
</html>    