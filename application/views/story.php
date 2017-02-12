<?php $this->load->view('include/header');

?>
<body>

<div class="image-section">
    
    <h1><?php echo $data_story[0]['title'];?></h1>
    <img src="http://<?php echo $data_story[0]['story_image'];?>" alt="">
    <p><?php echo $data_story[0]['description'];?></p>
    
    <div class="clear space10"></div>
    
    
    
    <div class="clear space20"></div>
    <div class="controller">
        <button type="button" name="" value="" class="left-arrow"></button>
        <p>CHECK-IN</p>
        <button type="button" name="" value="" class="right-arrow"></button>
    </div>
    
    <div class="clear space10"></div>
    <div class="clear"></div>
    <a href="<?php echo base_url();?>tapme">Go Back</a>
    
</div>    
  
</body>    
</html>    