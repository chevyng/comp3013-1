<table class="table table-hover">
  <thead>
      <tr>
          <th>circleID</th>
          <th>userID</th>
          <th>Name</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($circles as $circle) { ?>
      <tr>
        <th scope="row"><?php echo $circle->circleID ?></th>
        <td>User <?php echo $circle->userID ?></td>
        <td><?php echo $circle->name ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#editCircle<?php echo $circle->circleID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_circle?circleID=<?php echo $circle->circleID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_circle.php'; ?>
    <?php } ?>
  </tbody>
</table>
