{{-- <section class="footer">
    <div class="container">
        <div class="row justify-content-center text-center align-items-center py-5">
            <div class="col-lg-6 p-3 p-0">
                <p class="fs-4 m-0">2022 Madtive Studio</p>
            </div>
            <div class="col-lg-6 p-3">
                <img src="/img/logo vismart studio white.png" class="card-img-top" alt="..." style="width: 200px">
            </div>
        </div>
    </div>
</section> --}}

<!-- Remove the container if you want to extend the Footer to full width. -->

    <!-- Footer -->
    <footer id="footer">
      <!-- Grid container -->
      <div class="container p-5 pb-0">
        <!-- Section: Links -->
        <div class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto my-5">
                <img src="/img/logo vismart studio white.png" class="img-fluid mb-4" alt="..." style="width: 10em">
              <p>
                Kami adalah tim kreatif dari PT <a href="https://madtive.com/" style="color: #fff" class="fw-bold">Madtive Studio</a> Indonesia yang didirikan sejak tahun 2015 yang sudah bekerjasama dengan banyak clients mulai dari UMKM, Perusahaan menengah keatas hingga pemerintahan. 
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto my-5">
              <h5 class="text-uppercase mb-4 fw-bold">Menu</h5>
              <p>
                <a href="/" class="text-white">Home</a>
              </p>
              <p>
                <a href="/#page-2" class="text-white">Services</a>
              </p>
              <p>
                <a href="/#page-3" class="text-white">Our Clients</a>
              </p>
              <p>
                <a href="/#client" class="text-white">Article</a>
              </p>
              <p>
                <a href="/#contact" class="text-white">Contact Us</a>
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto my-5">
              <h5 class="text-uppercase mb-4 fw-bold">
                Best Services
              </h5>
              <?php
                  use App\Models\DetailService;

                   $servic = DetailService::leftJoin('service', 'service.id', 'detail_service.service_id')
                        ->select('detail_service.*', 'title', 'logo', 'slug')
                        ->orderBy('id', 'asc')->get();
                   foreach ($servic as $item ) {
                    
                      
              ?>   
                <p>
                  <a href="{{ url('layanan/'.$item->slug) }}" class="text-white">{{ $item->title }}</a>
                </p>
   
              <?php
                  }
              ?>
            </div>
  
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto my-5">
              <h5 class="text-uppercase mb-4 fw-bold">Contact Us</h5>
              <p><i class="fas fa-home mr-3 me-2"></i> Kampung Bojongherang, Kecamatan Cianjur, Kabupaten Cianjur, Jawa Barat Indonesia, 43253</p>
              <p><i class="fas fa-envelope mr-3 me-2"></i> meet@madtive.com</p>
              <p><i class="fas fa-phone mr-3 me-2"></i> 087836370765</p>
            </div>
            <!-- Grid column -->
          </div>
          <!--Grid row-->
        </div>
        <!-- div: Links -->
  
        <hr class="my-3">
  
        <!-- div: Copyright -->
        <div class="p-3 pt-0">
          <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-7 col-lg-8 text-center text-md-start">
              <!-- Copyright -->
              <div class="p-3">
                Copyright 2022 <a href="/" style="color: #fff">Vismart Studio.</a> All rights reserved.
              </div>
              <!-- Copyright -->
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
              <!-- Facebook -->
              <a href="https://www.facebook.com/Madtive" 
                 class="btn badge-primary btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-facebook-f"></i
                ></a>
  
              <!-- Twitter -->
              <a href="https://twitter.com/madtive_studio"
                 class="btn badge-primary btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-twitter"></i
                ></a>
  
              <!-- Google -->
              <a href="https://madtive.com/"
                 class="btn badge-primary btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-google"></i
                ></a>
  
              <!-- Instagram -->
              <a href="https://www.instagram.com/madtive_studio/"
                 class="btn badge-primary btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-instagram"></i
                ></a>
            </div>
            <!-- Grid column -->
          </div>
        </div>
        <!-- Section: Copyright -->
      </div>
      <!-- Grid container -->
    </footer>
    <!-- Footer -->

  <!-- End of .container -->
