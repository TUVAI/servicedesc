<div class="container main">   
  	<div class="page-header">
  		<h1>Admin Page</h1>
  	</div>


  <?= anchor('admin/add_company', 'Добавить компанию', array('title' => 'Добавить компанию', 'class' => 'btn btn-success'));?>
  <?= anchor('admin/add_department', 'Добавить отдел', array('title' => 'Добавить отдел', 'class' => 'btn btn-success'));?>
  <br><br>
  <div class="clear"></div>
  <table class="table" style="width: auto">
    <tr>
      <th>Имя организации</th>
      <th>редактировать</th>
      <th>удалить</th>
    </tr>
      <?php foreach ($companies as $company): ?>
    <tr>
      <td><?=$company['name'] ?></td>
      <td><a href="/admin/edit_company/<?=$company['id']?>">редактировать</a></td>
      <td><a href="/admin/del_company/<?=$company['id']?>">удалить</a></td>
    </tr>
      <?php endforeach; ?>
  </table>

</select>
	  <div class="well">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Nemo repudiandae quis fugiat numquam eveniet voluptate ullam cupiditate earum officiis, modi, repellendus vero animi et.
			Porro corporis inventore ducimus voluptates necessitatibus.</p>
	  </div>
  </div>