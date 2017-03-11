<table class="table table-hover">
  <thead>
      <tr>
          <th>userID</th>
          <th>About</th>
          <th>Gender</th>
          <th>Birthdate</th>
          <th>Currenct City</th>
          <th>Home City</th>
          <th>Address</th>
          <th>Language</th>
          <th>Workplace</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($profiles as $profile) { ?>
      <tr>
        <th scope="row"><?php echo $profile->userID ?></th>
        <td><?php echo $profile->about ?></td>
        <td><?php echo $profile->gender ?></td>
        <td><?php echo $profile->birthdate ?></td>
        <td><?php echo $profile->current_city ?></td>
        <td><?php echo $profile->home_city ?></td>
        <td><?php echo $profile->address ?></td>
        <td><?php echo $profile->languages ?></td>
        <td><?php echo $profile->workplace ?></td>
        <td class="text-right">
          <button type="button" class="btn-link" data-toggle="modal" data-target="#editProfile<?php echo $profile->userID ?>">
            Edit
          </button>
          <a href="<?php echo URL ?>admin/delete_profile?userID=<?php echo $profile->userID ?>" class="btn-link">Delete</a>
        </td>
      </tr>
      <?php require APP . 'view/admin/edit_profile.php'; ?>
    <?php } ?>
  </tbody>
</table>
