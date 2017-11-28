<div class="container">
  <h4>Selected Store ID: <?=$address->store_id?></h4>
  <h4>City: <?=$address->city?>, Country: <?=$address->country?></h4>
  <table class="table table-bordered" id="table_id">
    <thead>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Active</th>
      <th>Films Checked Out</th>
      <th>Actions</th>
    </thead>
    <thead>
      <form id="form_add">
        <input type="hidden" name="store_id" value="<?=$address->store_id?>">
        <input type="hidden" name="address_id" value="0"> <!-- not set for now-->
        <input type="hidden" name="active" value="1">
        <div class="form-body">
          <div class="form-group">
              <th><input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required=""></th>
          </div>
          <div class="form-group">
              <th><input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required=""></th>
          </div>
        </div>
      </form>
      <th><span style="font-size: 35px" class="glyphicon glyphicon-ok"></span></th>
      <th></th>
      <th><button class="btn btn-success" onclick="add_customer()"><span class="glyphicon glyphicon-plus"></span></button></th>
    </thead>
    <?php
      foreach ($customers as $customer) {
        ?>
    <tr>
      <td><?php echo $customer->last_name;?></td>
      <td><?php echo $customer->first_name;?></td>
      <td><?php if($customer->active == "0") {
                  echo '<span style="font-size: 35px" class="glyphicon glyphicon-remove"></span>';
                }
                if($customer->active == "1") {
                  echo '<span style="font-size: 35px" class="glyphicon glyphicon-ok"></span>';
                }
          ?>
      </td>
      <td>
        <button class="btn btn-default" onclick="show_title_list(<?php echo $customer->customer_id?>)"><span class="glyphicon glyphicon-list"></span></button>
      </td>
      <td>
        <button class="btn btn-warning" onclick="update_customer(<?php echo $customer->customer_id?>)"><span class="glyphicon glyphicon-pencil"></span></button>
        <button class="btn btn-danger" onclick="show_delete_dialog(<?php echo $customer->customer_id?>)"><span class="glyphicon glyphicon-trash"></span></button>
      </td>
    </tr>
    <?php }
    ?>
  </table>
</div>
