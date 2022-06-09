<div class="modal fade" id="login-pelaksana" tabindex="-1" role="dialog" aria-labelledby="login-pelaksanaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login-pelaksanaLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url();?>registrasi/login" method="post">
          <div class="modal-body">
            <label for="username">Username / Email / NIK / NIP</label>
            <input type="text" name="username" id="username" class='form-control'>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class='form-control'>
            <br>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- <script>
  $("#login-submit").submit(function(e){
      e.preventDefault();
      $.ajax({
          url: '<?//= base_url(); ?>registrasi/login',
          type: 'post',
          data: $(this).serialize()
      });
  })
</script> -->
        
        
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container">

                <div class="row">
                    <div class="col m6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5732321271853!2d106.85679151530861!3d-6.187821095520321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f45a2a367acd%3A0xe71da3192bd71972!2sPusat+Pengujian+Obat+Dan+Makanan+Nasional!5e0!3m2!1sid!2sid!4v1539076197218" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                
                    <div class="col m3">
                        <h5>Kontak Kami</h5>
                        <i class="fa fa-map-marker-alt"></i>
                        Pusat Riset dan Kajian Obat Makanan Badan Pengawas Obat dan Makanan <br> Jalan Percetakan Negara No.23 Jakarta Pusat 10560
                        <br>
                        <br>
                        <i class="fa fa-phone"></i>
                        0812312
                        0812312
                        <br>
                        <br>
                        <i class="fa fa-envelope">
                        asdfasdf@adsfasf.sdf
                        </i>
                
                        <br><br>
                        <h5>Jadwal layanan</h5>
                        Senin - Kamis : pukul 08:00 - 16:00 <br>
                        Jumat : pukul 08:00 - 15:00 <br>
                        Waktu setempat 
                    </div>
                
                </div>
            </div>

            <br><br>
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Pusat Pengembangan Pengujian Obat dan Makanan Nasional</div></div>
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

<!-- <video src="" ></video>
    <br />
<button id='flipCamera'>Flip</button>
</body>
<script>
  var front = false;
var video = document.querySelector('video');
  document.getElementById('flipCamera').onclick = function() { front = !front; };
  var constraints = { video: { facingMode: (front? "user" : "environment"), width: 640, height: 480  } };
  navigator.mediaDevices.getUserMedia(constraints)
  .then(function(mediaStream) {
    video.srcObject = mediaStream;
    video.onloadedmetadata = function(e) {
    video.play();
};
})
.catch(function(err) { console.log(err.name + ": " + err.message); })
</script></html> -->
        
    </body>
</html>
