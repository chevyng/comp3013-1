<table class="table table-hover">
  <thead>
      <tr>
          <th>photoID</th>
          <th>collectionID</th>
          <th>userID</th>
          <th>Path</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($photos as $photo) { ?>
      <tr>
        <th scope="row"><?php echo $photo->photoID ?></th>
        <td>Collection <?php echo $photo->collectionID ?></td>
        <td>User <?php echo $photo->userID ?></td>
        <td><?php echo $photo->path ?></td>
        <td class="text-right">
          <a href="<?php echo URL ?>admin/delete_photo?photoID=<?php echo $photo->photoID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
