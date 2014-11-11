<?php
$filename = $file['file_name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

$fileUrl = site_url("assets/uploads/licenses/{$filename}");
?>

<input type="hidden" id="filename" name="filename" value="<?php echo $filename ?>" />

<?php
if (in_array($ext, array('jpg', 'JPG', 'png', 'gif', 'tif'))) :
    ?>
    <div class="imagepreview"><img src="<?php echo $fileUrl ?>" class="kgt59">
    </div>
<?php
elseif (in_array($ext, array('doc', 'docx', 'pdf'))):
    ?>
    <iframe class="kgt59"
            src="https://docs.google.com/viewer?url=<?php echo urlencode($fileUrl); ?>&embedded=true"></iframe>
<?php
endif;
?>
