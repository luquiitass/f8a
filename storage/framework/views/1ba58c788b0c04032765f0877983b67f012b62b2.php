<?php if($errors->has($name)): ?>
	<ul>
	<?php foreach($errors->get($name) as $er): ?>
		<li style=" color: #b10c06; "><?php echo e($er); ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>