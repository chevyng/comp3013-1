<table class="table table-hover">
  <thead>
      <tr>
          <th>userID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Privacy</th>
          <th>Admin</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) {
    ?>
      <tr>
        <th scope="row"><?php echo $user->userID ?></th>
        <td><?php echo $user->first_name ?></td>
        <td><?php echo $user->last_name ?></td>
        <td><?php echo $user->email ?></td>
        <td><?php echo $user->privacy ?></td>
        <td><?php echo $user->admin ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#edit<?php echo $user->userID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_user?userID=<?php echo $user->userID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_user.php'; ?>
    <?php } ?>
  </tbody>
</table>
