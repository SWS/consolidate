<?php
$filename = $file['file_name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

$fileUrl = site_url("assets/uploads/winner_image/{$filename}");
?>


<?php if(!empty($file['receipt_copy'])){ ?>
<input type="hidden" id="uploadedFile" name="receipt_copy_file" value="<?php echo $filename ?>" />
<?php } ?>

<?php if(!empty($file['passport_copy'])){ ?>
<input type="hidden" id="passport_file" name="passport_copy_file" value="<?php echo $filename ?>" />
<?php } ?>
 
 <!-- End here -->

<?php
if (in_array($ext, array('jpg', 'JPG', 'png'))) :
    ?>
    <div class="imagepreview"><img src="<?php echo $fileUrl ?>" class="kgtimagepreview">
    </div>
<?php
elseif (in_array($ext, array('doc', 'docx', 'pdf'))):
    ?>
    <iframe class="kgtimagepreview"
            src="https://docs.google.com/viewer?url=<?php echo urlencode($fileUrl); ?>&embedded=true"></iframe>
<?php
endif;
?>
