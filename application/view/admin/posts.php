<table class="table table-hover">
  <thead>
      <tr>
          <th>postID</th>
          <th>blogID</th>
          <th>Title</th>
          <th>Body</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($posts as $post) {
    ?>
      <tr>
        <th scope="row"><?php echo $post->postID ?></th>
        <td><?php echo $post->blogID ?></td>
        <td><?php echo $post->title ?></td>
        <td><?php echo $post->body ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#editPost<?php echo $post->postID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_post?postID=<?php echo $post->postID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_post.php'; ?>
    <?php } ?>
  </tbody>
</table>
