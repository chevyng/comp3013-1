<table class="table table-hover">
  <thead>
      <tr>
          <th>commentID</th>
          <th>userID</th>
          <th>photoID</th>
          <th>Content</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <th scope="row"><?php echo $comment->commentID ?></th>
        <td>User <?php echo $comment->userID ?></td>
        <td>Photo <?php echo $comment->photoID ?></td>
        <td><?php echo $comment->content ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#editComment<?php echo $comment->commentID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_comment?commentID=<?php echo $comment->commentID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_comment.php'; ?>
    <?php } ?>
  </tbody>
</table>
