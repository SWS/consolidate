<script type="text/javascript">
    $(document).ready(function () {
        $('#modal_success').modal('show');
        $('#ok_bttn').click(function () {
            window.location.href = "career/index";
            return false;
        });
    })
</script>
<div class="bodywrapper">

    <?php include('/../temp/include/header_child.php'); ?>
    <?php include('include/address.php'); ?>


    <div class="container">
        <div class="main-page">

            <div class="car-lists">
                <div class="form-fill-cart">
                    <div class="row">
                        <div class="col-md-6">

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


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End content-->
    </div>


    <div class="modal fade" id="modal_success">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal">THANK YOU</h2>

                        <p>
                            <?php
                            if ($this->session->flashdata('success')) {
                                $msg = $this->session->flashdata('success');
                                echo $msg;
                            } else {
                                redirect('career/index');
                            }
                            ?>

                        </p>

                        <div class="clearfix"></div>
                        <div class="btn-modal">

                            <a href="javascript:void(0)" id="ok_bttn"
                               onClick="$('#modal_success').modal('hide')" class="floatright1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
