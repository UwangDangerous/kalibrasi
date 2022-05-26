
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url(); ?>assets/templates/js/scripts.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.js" ></script>
        
        <script>
            var i = 0 ;
            $("#go-scan").click(function(){
                if(i % 2 == 0){
                    $("#scan-kamera").load("<?= base_url();?>home/scan_kamera") ;
                    $("#btn-scan").html(
                        `
                            <a class="btn btn-primary btn-xl bayangan"  href="<?= base_url();?>">refresh</a>
                        `
                    ) ;
                }

                i++ ;
            });
        </script>

        <script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
        <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js" ></script>
        <script>
            $(document).ready(function() {
                $('#tabel').dataTable();
            } );
        </script>

        
    </body>
</html>
