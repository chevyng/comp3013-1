<table class="table table-hover">
  <thead>
      <tr>
          <th>cFriendsID</th>
          <th>circleID</th>
          <th>userID</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($members as $member) {
    ?>
      <tr>
        <th scope="row"><?php echo $member->cFriendsID ?></th>
        <td><?php echo $member->circleID ?></td>
        <td><?php echo $member->userID ?></td>
        <td class="text-right">
          <a href="<?php echo URL ?>admin/delete_member?cFriendsID=<?php echo $member->cFriendsID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
