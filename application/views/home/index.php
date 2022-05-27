<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold"><?= $jumbotron['judul']; ?></h1>
                <!-- <hr class="divider"/> --> <br>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5"><?= $jumbotron['isi']; ?></p>
                <a class="btn btn-primary btn-xl" href="#scan" data-target="#exampleModal">SCAN QR</a>
            </div>
        </div>
    </div>
</header>


<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"> <?= $about['judul']; ?> </h2>
                <!-- <hr class="divider divider-light" /> --> <br>
                <p class="text-white-75 mb-4"><?= $about['isi']; ?></p>
            </div>
        </div>
    </div>
</section>


<!-- scan-->
<section class="page-section" id="scan">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">SCAN QR CODE</h2>
        <!-- <hr class="divider" /> --> <br>
        <div class="row gx-4 gx-lg-5">
            <?php $i = 1; ?>
            <?php foreach ($scan as $s) : ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-3">
                        <?php if($i == 1) : ?>
                            <div class="mb-2"><i class="fas fa-qrcode fs-1 text-primary"></i></div>
                        <?php elseif($i == 2) : ?>
                            <div class="mb-2"><i class="fas fa-laptop fs-1 text-primary"></i></div>
                        <?php else : ?>
                            <div class="mb-2"><i class="fas fa-globe fs-1 text-primary"></i></div>
                        <?php endif ; ?>
                        <h3 class="h4 mb-2"><?= $s['judul']; ?></h3>
                        <p class="text-muted mb-0"><?= $s['isi']; ?></p>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach ; ?>
            
            
            <div class="col-lg-3 text-center mt-4"></div>
            <div class="col-lg-6 text-center mt-4">
                <br><br><br><br><br>
                
                <div class="d-grid" id="btn-scan">
                    <button class="btn btn-primary btn-xl bayangan"  type="button" id="go-scan">buka kamera</button>
                </div>
                
                <div id="scan-kamera"></div>
            </div>
        </div>
    </div>
    
</section>


<!-- Contact-->
<section class="page-section bg-primary text-light" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Hubungi Kami</h2>
                <br>
                <p class="mb-5">Silahkan berikan ulasan untuk aplikasi</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5 text-dark">
            <div class="col-lg-6">
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Full name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Phone number</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <br>
                    <div class="d-grid"><button class="btn btn-primary btn-xl bayangan"  type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>



