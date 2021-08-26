<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
			<?php foreach (session()->get('menu') as $row) : ?>
			<?php if (count($row->subs) >= 1) : ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#<?=$row->name ?>">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							<?php echo $row->name ?>
						</a>
					</h4>
				</div>
				<div id="<?=$row->name ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
						<li><a href="product/category/<?php echo $row->meta_key ?>"><?php echo $row->name ?></a></li>
						<?php foreach ($row->subs as $sub) : ?>
							<li><a href="product/category/<?php echo $sub->meta_key ?>"><?php echo $sub->name ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

			<?php else : ?>
				<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $row->name ?>">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							<?php echo $row->name ?>
						</a>
					</h4>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<!--/brands_products-->

		
		<!--/price-range-->

		<!--/shipping-->

	</div>
</div>