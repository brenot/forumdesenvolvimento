<div class="section-inner <?php echo $helper->get('block-extra-class'); ?>">
	<?php if($module->showtitle || $helper->get('block-intro')): ?>
	<h1 class="section-title ">
		<?php if($module->showtitle): ?>
			<span><?php echo $module->title ?></span>
		<?php endif; ?>

	</h1>
	<?php endif; ?>


		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php if($helper->get('block-intro')): ?>
				<p class="container-sm section-intro hidden-xs"><?php echo $helper->get('block-intro'); ?></p>
			<?php endif; ?>	

	<div class="acm-cta style-1">
		<?php $count = $helper->getRows('data.button');  ?>

		<?php for ($i=0; $i<$count; $i++) : ?>
			<?php if($helper->get('data.button',$i) && $helper->get('data.link',$i)): ?>
			<a href="<?php echo $helper->get('data.link',$i) ?>" class="btn <?php if($helper->get('data.button_class',$i)): echo $helper->get('data.button_class',$i); else: echo 'btn-default'; endif; ?>"><?php echo $helper->get('data.button',$i) ?>
				<i class="fa fa-angle-right"></i>
			</a>
			<?php endif; ?>
	
		<?php endfor; ?>
	
	</div>

			
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://www.youtube.com/embed/dgh9ySBqao8?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
		</div>






</div>