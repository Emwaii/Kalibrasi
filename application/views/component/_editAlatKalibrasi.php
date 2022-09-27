<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Edit Alat Kalibrasi
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Start Sales Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcard') 
                        ?> -->
                <!-- End Sales Charts Section -->

                <!-- Start Location and Earnings Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcardtwo') 
                        ?> -->
                <!-- Row -->
                <!-- multi-column ordering -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive bg-success">
                                    <!-- Form Add Modal -->

                                    <!-- <div class="modal-dialog"> -->
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-success">
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Data Alat Kalibrasi
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('AlatKalibrasi/update_alatkalibrasi') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                                                <input type="text" hidden name="id_alat" id="id_alat" value="<?= $alat_kalibrasi->id_alat ?>">
                                                <div class="form-group">
                                                    <label for="nama_alat"><strong>Nama Alat</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="nama_alat" id="nama_alat" placeholder="Nama Alat" value="<?= $alat_kalibrasi->nama_alat ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merk_alat"><strong>Merk Alat</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="merk_alat" id="merk_alat" placeholder="Merk Alat" value="<?= $alat_kalibrasi->merk_alat ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipe_alat"><strong>Tipe Alat</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="tipe_alat" id="tipe_alat" placeholder="Tipe Alat" value="<?= $alat_kalibrasi->tipe_alat ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="noseri_alat"><strong>No Seri Alat</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="noseri_alat" id="noseri_alat" placeholder="No Seri Alat" value="<?= $alat_kalibrasi->noseri_alat ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lokasi_alat"><strong>Lokasi</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="lokasi_alat" id="lokasi_alat" placeholder="Lokasi Alat" value="<?= $alat_kalibrasi->lokasi_alat ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tglpengadaan_alat"><strong>Tanggal Pengadaan</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="tglpengadaan_alat" id="tglpengadaan_alat" placeholder="Tanggal Pengadaan" value="<?= $alat_kalibrasi->tglpengadaan_alat ?>" required>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('alatKalibrasis') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                    <!--</div> /.modal-dialog -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Row -->
                <!-- End Location and Earnings Charts Section -->

                <!-- Start Top Leader Table -->
                <!-- <?php //$this->load->view('component/_table') 
                        ?> -->
                <!-- End Top Leader Table -->
            </div>

            <!-- End Container fluid  -->

            <!-- footer -->
            <?php $this->load->view('component/_footer') ?>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>