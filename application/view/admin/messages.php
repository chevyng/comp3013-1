<table class="table table-hover">
  <thead>
      <tr>
          <th>messageID</th>
          <th>circleID</th>
          <th>userID</th>
          <th>Content</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($messages as $message) { ?>
      <tr>
        <th scope="row"><?php echo $message->messageID ?></th>
        <td>Circle <?php echo $message->circleID ?></td>
        <td>User <?php echo $message->userID ?></td>
        <td><?php echo $message->content ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#editMessage<?php echo $message->messageID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_message?messageID=<?php echo $message->messageID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_message.php'; ?>
    <?php } ?>
  </tbody>
</table>
