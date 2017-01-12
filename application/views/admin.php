<div class="container main">   
  	<div class="page-header">
  		<h1>Admin Page</h1>
  	</div>


	<?= anchor('admin/add_company', 'Добавить компанию', array('title' => 'Добавить компанию'));?>

<select id="mmm">
	<?php foreach ($companies as $company): ?>
		<option value="<?=$company['id'] ?>">
			<?=$company['name'] ?>
		</option>
	<?php endforeach; ?>
</select>
	  <div class="well">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Nemo repudiandae quis fugiat numquam eveniet voluptate ullam cupiditate earum officiis, modi, repellendus vero animi et.
			Porro corporis inventore ducimus voluptates necessitatibus.</p>
	  </div>
  </div>