<?php
  move_uploaded_file($_FILES["file"]["tmp_name"],
        "file/" . $_FILES["file"]["name"]);

  echo "<script>window.location.href='./?type=admin'</script>"
?>