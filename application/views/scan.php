    <!-- <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	 -->
    <center class="text-white">
        <br>
        <h3>QR Scanner Alat</h3>
        <div class="btn-group btn-group-toogle mb5">
            <label for="1" class="btn border" >
                <input type="radio" name="options" id="1" value="1" autocomplete="off" checked> Kamera Depan
            </label>
            <label for="2" class="btn border">
                <input type="radio" name="options" id="2" value="2" autocomplete="off"> Kamera Belakang
            </label>
        </div> <br>
        <video src="" id="preview" height="100%" width="100%"></video>

    </center>
        
    
    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            window.location.href = "<?= base_url(); ?>home/riwayatPenggunaanAlat?k="+content+"#riwayat";
        });
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length>0){
                scanner.start(cameras[0]) ;
                $("[name = 'options']").change(function(){
                    if($(this).val()==1){
                        if(cameras[0]!=""){
                            scanner.start(cameras[0]);
                        }else{
                            alert('tidak ada kamera depan') ;
                        }
                    }else if($(this).val()==2){
                        if(cameras[1] != ""){
                            scanner.start(cameras[1]);
                        }else{
                            alert("tidak ada kamera belakang") ;
                        }
                    }
                })
            }else{
                alert("tidak ada kamera") ;
            }
        }).catch(function(e){
            alert(e) ;
        });
    </script>