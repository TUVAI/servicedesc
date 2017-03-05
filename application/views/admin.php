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

  <table class="table" style="width: auto">
    <tr>
      <th>ФИО</th>
      <th>email</th>
      <th>телефон</th>
      <th>Компания</th>
      <th>Отдел</th>
      <th>Должность</th>
      <th>Роль</th>
      <th>Редактировать</th>
      <th>Удалить</th>
    </tr>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?=$user['lname'] ?> <?=$user['fname'] ?> <?=$user['sname'] ?></td>
        <td><?=$user['email'] ?></td>
        <td><?=$user['phone'] ?></td>
        <td><?=$user['company'] ?></td>
        <td><?=$user['department'] ?></td>
        <td><?=$user['position'] ?></td>
        <td><?=$user['role'] ?></td>
        <td><a href="/admin/edit_user/<?=$user['id']?>">редактировать</a></td>
        <td><a href="/admin/del_user/<?=$user['id']?>">удалить</a></td>
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