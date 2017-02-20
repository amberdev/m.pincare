<?php $this->load->view('include/header');?>
<body>

<div class="image-section">
    
<div class="flexslider">
<ul class="slides">

<?php if(!empty($data_story)){
        $i=1;
        foreach($data_story as $story){?>

    <li>
<h1><?php echo $story['title'];?></h1><div class="coma" style="display: none;">~</div>
<img src="http://<?php echo $story['story_image'];?>" id="img_<?php echo $i;?>" alt=""><div class="coma" style="display: none;">~</div>
<p><?php echo $story['description'];?></p><div class="coma" style="display: none;">~</div>
<div class="str_id" style="display: none;"><?php echo $story['id'];?></div><div class="coma" style="display: none;">~</div>
<div class="plc_id" style="display: none;"><?php echo @$place_id;?></div><div class="coma" style="display: none;">~</div>
<div class="out_id" style="display: none;"><?php echo @$outlet_id;?></div><div class="coma" style="display: none;">~</div>
<div class="user_fid" style="display: none;"><?php echo @$user_fb_id;?></div><div class="coma" style="display: none;">~</div>
<div class="img_src" style="display: none;">http://<?php echo $story['story_image'];?></div>
<div class="coma" style="display: none;">~</div>
</li>

    <?php $i++;}}?>

</ul>
</div>
    
    <div class="clear space20"></div>
    <div class="controller">
        <button type="button" name="" value="" class="left-arrow"></button>
        <?php 
        if(!isset($place_id) && !isset($outlet_id)){?>

                <p id="shareit_id" style="cursor: pointer;" onclick="shareit('<?php echo @$data_story[0]['title'];?>','link','http://<?php echo @$data_story[0]["story_image"];?>','caption','<?php echo trim(addslashes(@$data_story[0]["description"]));?>');">Share</p>

           <?php }else{?>

        <p id="checkin_id" style="cursor: pointer;" onclick="checkin('<?php echo @$place_id;?>','<?php echo @$outlet_id;?>','<?php echo @$user_fb_id;?>','<?php echo @$data_story[0]['id'];?>');">CHECK-IN</p>
        <?php }?>
        <button type="button" name="" value="" class="right-arrow"></button>
    </div>
    
    <div class="clear space10"></div>
    <div class="clear"></div>
    <a href="<?php echo base_url();?>tapme">Go Back</a>
    
</div>    
  
</body>    
</html>    