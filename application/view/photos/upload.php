<div class="container">
  <form action="<?php echo URL; ?>photo/upload" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="uploadFile" id="upload_file"  required>
    <input type="hidden" name="collectionID" value="<?php echo $collectionID ?>">
    <input type="submit" value="Upload Image" name="submit">
  </form>
</div>
