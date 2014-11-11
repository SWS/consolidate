

<!-- Main content -->

<div class="content zerorightmargin">

<?php
if ($this->session->flashdata('success')) {

    $msg = $this->session->flashdata('success');
    ?>

    <div class="notice outer">

        <div class="note"><?php echo $msg; ?>

        </div>

    </div>

<?php
}
?>

<?php
if ($this->session->flashdata('error')) {

    $msg = $this->session->flashdata('error');
    ?>

    <div class="notice outer">

        <div class="error"><?php echo $msg; ?>

        </div>

    </div>

<?php
}
?>







<div class="outer">

<div class="inner">

<div class="page-header">

<!-- page title -->

<h5><i class="font-user"></i><?php echo $name; ?> Setting</h5>

<!-- End page title -->

<div class="body">


<!-- Content container -->

<div class="container">

<!-- Default datatable -->

<div class="block well margintop-30px">

<div class="navbar">

    <div class="navbar-inner">

        <h5><?php echo $this->lang->line('') . 'List'; ?></h5>


    </div>

</div>

<div class="table-overflow">

<div id="data-table_wrapper" class="dataTables_wrapper" role="grid">

<div class="datatable-header padding10px">

<?php
if ($name == 'Welcome Page') {
    ?>

    <a href="admin/index/welcome_page" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Welcome Page'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/globe_product" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Globe Product'; ?></div>

    </a>

    <div class="clear-fix"></div>

<?php
} else if ($name == 'Home Page') {
    ?>

    <a href="admin/index/library_page" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'E-Library Background'; ?></div>

    </a>



    <div class="clear-fix"></div>

    <a href="admin/index/library_product" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'E-Library Product'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/slider" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Slider'; ?></div>

    </a>

    <div class="clear-fix"></div>


    <a href="admin/settings/index" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Global Settings'; ?></div>

    </a>

    <div class="clear-fix"></div>



<?php
} else if ($name == 'Promotion') {
    ?>

    <a href="admin/index/promotion_section" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Promotion'; ?></div>

    </a>

    <div class="clear-fix"></div>




    <a href="admin/index/promotion_user" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Download Request User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/knowledge_subtitle" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Knowledge Center SubTitle'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/promotion_block_user" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Block User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



<?php
} else if ($name == 'product') {
    ?>

    <a href="admin/index/vehicles_part" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Product Type'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/brand" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Brand'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/model" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Model'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/product" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Products'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/incoterm" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Incoterms'; ?></div>

    </a>

    <div class="clear-fix"></div>



<?php
} else if ($name == 'Order') {
    ?>

    <a href="admin/index/order_list" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Order History'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/order_user" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Order User List'; ?></div>

    </a>

    <div class="clear-fix"></div>





<?php
} else if ($name == 'interview') {
    ?>

    <a href="admin/career/job_section" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Job section'; ?></div>

    </a>

    <div class="clear-fix"></div>

    <a href="admin/career/interview_section" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/career/user_block" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Block User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



<?php
} else if ($name == 'distribution') {
    ?>


    <div class="clear-fix"></div>

    <a href="admin/distribution/user_list" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/distribution/distribution_blocks_list" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Block User List'; ?></div>

    </a>

    <div class="clear-fix"></div>

<?php
} else if ($name == 'contact') {
    ?>



    <a href="admin/index/contact_user" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



    <a href="admin/index/contact_user_block" class="floatleft">

        <div id="" class="selector1"><?php echo $this->lang->line('') . 'Block User List'; ?></div>

    </a>

    <div class="clear-fix"></div>



<?php
}
?>


</div>

</div>

</div>

</div>

<!-- /default datatable -->


<!-- Pickers -->

</div>


<!-- /pickers -->


</div>


</div>

</div>

</div>

<!-- /content -->


<!-- Right sidebar -->


<!-- /right sidebar -->

</div>

<!-- /main wrapper -->