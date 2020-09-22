        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bend Coder (Bendi Tandayu Saputra) 2020 Made With <i class="fa fa-heart text-danger"></i></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url('template/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('template/vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>

  <?php if ( isset($css) ) : ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $css ?>">
  <?php endif ?>
  <script src="<?php echo base_url('modules/app.js') ?>"></script>
  <script>
    app.site = "<?php echo site_url('') ?>"
    app.base = "<?php echo base_url('') ?>"
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('template/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('template/js/sb-admin-2.min.js') ?>"></script>

  <?php if ( isset($js) ) : ?>
    <?php if ( is_array($js) ) : ?>
      <?php foreach ( $js as $value ) : ?>
        <script src="<?php echo $value ?>"></script>
      <?php endforeach ?>
    <?php else : ?>
      <script src="<?php echo $js ?>"></script>
    <?php endif ?>
  <?php endif ?>

</body>

</html>