<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@section('base_header')
@include('home.block.base_header')
@show
</head>

<body>
<!-- top -->
<div class="top">
      @section('header')
          @include('home.block.header')
          @include('home.block.top')
      @show


</div>
<!-- end top -->
<!-- main -->
<div class="main">
    <div class="content">
	       <div class="c_qiehuan">
		          <!---->
				  <div class="c_q_title">
				         <ul>
						     <li><a href="<?php echo action('Home\IndexController@getIndex') ;?>" class=>综合导航</a></li>

							 <li><a href="<?php echo action('Home\QueryController@getIndex') ;?>">查询</a></li>
							 <li><a href="" class="select_a" >应用</a></li>
							 <li><a href="<?php echo action('Home\IndexController@getCategory') ;?>" >分类</a></li>
						 </ul>

						 <div class="clear"></div>
				  </div>
				  <div class="index-box">
				  <!---->
				    <div class="c_q_cont" style="display:block;">
				        <div class="cq_cent">

						      <ul class="list_hf">
						      <?php if(!empty($all_app)):?>
                                <?php foreach($all_app as $app_cat):?>
                                <li>
                                   <h4 class="l_h_tl"><?php echo $app_cat->cat_name;?></h4>
                                   <div class="l_h_rt">
                                      
                                       <?php if(!empty($app_cat->app)):?>
                                        <?php foreach($app_cat->app as $app):?>
                                            <span><a target="_blank" href="<?php echo $app->site_url ;?>"><?php echo $app->name ;?></a></span>
                                        <?php endforeach;?>
                                        <span><a target="_blank" href="<?php echo action('Home\AppController@getCategory', [$app->id]) ;?>">更多</a></span>
                                       <?php endif;?>
                                   </div>
                                   <div class="clear"></div>
                                </li>
                                <?php endforeach;?>
                              <?php endif;?>
							  </ul>
							  <div class="clear"></div>
						</div>
						 <div class="page_bt">
				          <ul>
						   <?php echo $all_app->render(); ?>
						 </ul>
						 <div class="clear"></div>
		               </div>
					   <!---->
				  </div>
				  <!---->

				  <!---->
				  </div>
		   </div>
	</div>
</div>
<!-- end main -->
<!-- footer -->
@section('footer')
@include('home.block.footer')
@show
<!-- end footer -->
</body>
</html>
