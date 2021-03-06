<!-- This file needs "assets/user/js/jquery-1.10.1.min.js" and will use header.php file -->
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
    <div id="result"></div>
    <div class="outer">
        <div class="inner">
            <div class="page-header">
                <!-- page title -->
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Promotion Section'; ?></h5>
                <!-- End page title -->
                <div class="body">


                    <!-- Content container -->
                    <div class="container">
                        <!-- Default datatable -->
                        <div class="block well margintop-30px">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <h5><?php echo $this->lang->line('') . 'List'; ?></h5>

                                    <div class="dataTables_length" id="data-table_length">
                                        <label>
                                            <div id="" class="selector">
                                                <a class="floatright" tabindex="0"
                                                   id="data-table_first" href="admin/index/add_promotion_section">
                                                    <?php echo $this->lang->line('add'); ?></a>
                                            </div>
                                            <div class="pull-right">
                                                <button id="delete_checked"
                                                        class="deletebtn1">
                                                    Delete All
                                                </button>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-overflow">
                                <div id="data-table_wrapper" class="dataTables_wrapper" role="grid">
                                    <table aria-describedby="data-table_info" class="table table-striped dataTable"
                                           id="data-table">
                                        <thead>
                                        <tr role="row">
                                            <th colspan="1" rowspan="1"><input id="delete_all_btn" type="checkbox"
                                                                               name="delete_option[]" value="all"></th>

                                            <th colspan="1" rowspan="1"
                                                width="60"><?php echo $this->lang->line('') . 'Name'; ?></th>
                                            <th colspan="1" rowspan="1"
                                                width="60"><?php echo $this->lang->line('') . 'Promotion'; ?></th>
                                            <th colspan="1"
                                                rowspan="1"><?php echo $this->lang->line('') . 'Sort description'; ?></th>
                                            <th colspan="1" rowspan="1"
                                                width="40"><?php echo $this->lang->line('') . 'Date'; ?></th>
                                            <th colspan="1" rowspan="1"
                                                width="40"><?php echo $this->lang->line('status'); ?></th>
                                            <th colspan="1" rowspan="1"
                                                width="110"><?php echo $this->lang->line('option'); ?></th>
                                        </tr>
                                        </thead>

                                        <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if (isset($all_data)) {
                                            foreach ($all_data as $set_data) {
                                                if (!empty($set_data['type'])) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td class="dataTables" valign="top">
                                                            <input class="blocks" type="checkbox" name="delete_option[]"
                                                                   value="<?php echo $set_data['id']; ?>">
                                                        </td>
                                                        <td class="dataTables" valign="top">
                                                            <?php echo $set_data['name']; ?>
                                                        </td>
                                                        <td class="dataTables" valign="top">
                                                            <?php echo $set_data['type']; ?>
                                                        </td>
                                                        <td class="dataTables" valign="top">

                                                            <?php echo $set_data['sort']; ?>


                                                        </td>
                                                        <td class="dataTables" valign="top">
                                                            <?php echo date('d-m-Y', $set_data['create_date']); ?>
                                                        </td>
                                                        <td class="dataTables" valign="top">
                                                            <select
                                                                onchange="user_status('promotion_section',<?php echo $set_data['id']; ?>,this.value)"
                                                                class="width100px" name="martial_id">
                                                                <?php
                                                                if ($set_data['status'] == 1) {
                                                                    echo '<option value="1" selected="selected">Active</option>';
                                                                    echo '<option value="0">Inactive</option>';
                                                                } else if ($set_data['status'] == 0) {
                                                                    echo '<option value="1">Active</option>';
                                                                    echo '<option value="0" selected="selected">Inactive</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td class="dataTables" valign="top">
                                                            <a href="admin/index/edit_promotion_section/<?php echo $set_data['id']; ?>">Edit</a>&nbsp;&nbsp;
                                                            <a href="admin/index/delete/promotion_section/<?php echo $set_data['id']; ?>"
                                                               onclick="return confirm_box();">Delete</a>

                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /default datatable -->


                        <!-- Pickers -->
                    </div>

                    <!-- /pickers -->

                </div>
                <!-- /content container -->

            </div>
        </div>
    </div>
</div>

<script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                        <script>
                            function user_status(name, id, value) {

                                $.ajax({
                                    type: "POST",
                                    url: "admin/index/update_status", /* The country id will be sent to this file */
                                    data: "table_name=" + name + "&id=" + id + "&status=" + value,
                                    beforeSend: function () {

                                    },
                                    success: function (msg) {

                                    }
                                });
                            }


                            $(document).ready(function () {

                                $("#delete_all_btn").click(function () {
                                    if ($("#delete_all_btn").is(':checked')) {
                                        $(".blocks").prop('checked', true);
                                    } else {
                                        $(".blocks").prop('checked', false);
                                    }
                                });
                                $("#delete_checked").click(function () {
                                    if ($('input.blocks:checkbox:checked').length) {
                                        var msg = "Are you sure???\nYou Want to Delete All.";
                                        var answer = confirm(msg);
                                        if (answer) {
                                            var blocksarray = [];
                                            $('input.blocks:checkbox:checked').each(function () {
                                                blocksarray.push($(this).val());
                                                $(this).parents('tr').hide();
                                            });
                                            var url = "admin/index/deleteAll";
                                            $.ajax({
                                                type: "POST",
                                                url: url,
                                                data: {
                                                    'block_ids': blocksarray,
                                                    'table': 'promotion_section',
                                                    'have_image': true,
                                                    'path': 'promotion_section'
                                                },
                                                success: function (data) {
                                                    $("#delete_all_btn").prop('checked', false);
                                                }
                                            });
                                        }
                                    } else {
                                        alert("Please select atleast one item.");
                                    }
                                });

                            });
                        </script>
                        <script type="text/javascript">
                            function confirm_box() {
                                var answer = confirm("Are you sure?");
                                if (!answer)
                                    return false;
                            }

                        </script>
