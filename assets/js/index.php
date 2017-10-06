<div class="panel panel-indigo">
<div class="panel-body collapse in">
<table width="100%" class="table table-striped table-bordered datatables" id="editable">
  <thead>
  <tr>
    <th>No</th>
    <th>Perlengkapan</th>
    <th>Status</th>
    <th><i class="glyphicon glyphicon-plus"></i>&nbsp;Perlengkapan</th>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=0;
  require "config/config.php";
  $query=mysql_query("select * from tools join users on tools.users_id=users.id");
  while($data=mysql_fetch_array($query)){
  $no++;
  ?>
  <tr>
    <td><?=$no?></td>
    <td><?=$data['tools_name']?></td>
    <td><?=$data['tools_status']?></td>
    <td style="width:20%"><i class="glyphicon glyphicon-eye-close"></i> &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-edit"></i> &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-edit"></i></td>
  </tr>
 <?php }?>
 </tbody>
</table>
</div>
</div>