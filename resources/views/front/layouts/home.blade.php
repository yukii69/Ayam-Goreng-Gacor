<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	  <title>Ayam Goreng Gacor</title>
    <meta name="author" content="">
	  <link rel="icon" href="{{ asset('front/images/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/templatemo-574-mexant.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="#" class="logo">
                          <img src="{{ asset('front/images/logo.png') }}" width="50%" alt="">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#about">About</a></li>
                          <li class="scroll-to-section"><a href="#book-table">Book-Table</a></li>
                          <li class="scroll-to-section"><a href="#gallery">Gallery</a></li>
                          <li class="scroll-to-section"><a href="#testimonials">Reviews</a></li>
                          <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
        
  <div class="swiper-container" id="top">
    <div class="swiper-wrapper">
    @foreach($banners as $banner)
    @if($banner->status == '1')
      
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url('{{ asset('uploads/banner/' . $banner->gambar_banner) }}')">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>{!! $banner->judul_banner !!}</h2>
                  <div class="div-dec"></div>
                  <p>{!! $banner->deskripsi !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    @endforeach
      
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>


  <!-- ***** Tentang Kami ***** -->

  <section class="tentang-kami" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="tentang-image">
            <!-- Gambar tentang kami (sebelah kiri) -->
            <img src="{{ asset('front/images/slide-02.jpg') }}" alt="Tentang Kami">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="header-text">
            <!-- Teks tentang kami (sebelah kanan) -->
            <h2>Tentang Kami</h2>
            <div class="div-dec"></div>
            <p>Ayam Goreng Gacor adalah usaha kuliner nusantara yang istimewa dengan pelayanan ramah yang berdiri sejak 2023. Kami menyajikan hidangan berbahan segar dan berkualitas tinggi. Ayam goreng kami menjadi hidangan unggulan, dimasak dengan bumbu dan rempah-rempah yang khas, memberikan cita rasa yang gurih dan nikmat. Menu kami juga lengkap dengan hidangan nusantara lainnya. Kepuasan pelanggan adalah prioritas kami. Selamat datang untuk menikmati cita rasa dan suasana hangat bersama kami!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ***** Main Banner Area End ***** -->
<section class="andalan" id="pt-5">
  <div class="container">
      <div class="section-heading">
        <h2>Menu Andalan</h2>
        <div class="div-dec"></div>
      </div>
	  <div class="slider">
				<div class="owl-carousel">
          @foreach($andalans as $andalan)
          @if($andalan->status == '1')
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center">
							<img src="{{ asset('uploads/andalan/' . $andalan->gambar_andalan) }}" alt="" >
						</div>
						<p class="text-center p-4">{!! $andalan->deskripsi !!}</p>
						<h5 class="mb-0 text-center"><b>{!! $andalan->judul_andalan !!}</b></h5>
					</div>
          @endif
          @endforeach
				</div>
			</div>
  </div>
</section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Daftar Menu Tersedia</h2>
            <h4>Variasi Lezat, Pilihan Beragam! Daftar Menu Tersedia Untuk Selera Anda! Silahkan Pilih Menu Kesukaan Anda.</h4>
            <div class="div-dec"></div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
          
          @foreach($menus as $menu)
          @if($menu->status == '1')
            <div class="item">
              <img src="{{ asset('uploads/menu/' . $menu->gambar_menu) }}" alt="Course One">
              <div class="down-content">
                <h4> {!! $menu->judul_menu !!}</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>{!! $menu->harga !!}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach        
          </div>
        </div>
      </div>
    </div>
  </section>	

  <section class="calculator" id="book-table">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="left-image">
            <img src="{{ asset('front/images/calculator-image.png') }}" alt="" width="100%">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h4>Pesan Meja Sekarang!</h4>
          </div>
          <form id="calculate" action="{{ route('send.submit') }}" method="post">
          @csrf
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <label for="name">Nama</label>
                  <input type="name" name="name" id="name" placeholder="" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="subject">Jumlah Tamu</label>
                  <input type="number" name="subject" id="subject" placeholder="" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="jadwal" class="form-label">Jadwal Pesanan</label>
                  <input type="datetime-local" name="jadwal" id="jadwal">
                  </select>
              </fieldset>
              </div>
              <div class="col-lg-12">
              <fieldset>
                <input type="hidden" name="noWA" value="{{ \App\Models\Wa::find(1)->no }}">
                <button type="submit" id="form-submit" class="orange-button">Submit Now</button>
              </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="promo" id="trainers">
    <div class="container">
      <div class="row justify-center">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6 style="font-size: 40px;">PROMO MINGGU INI</h6>
            <div class="div-dec"></div>
            <h4 style="font-size: 20px;">Promo Spesial Minggu Ini! Nikmati Diskon Hebat dan Penawaran Menarik!</h4>
          </div>
        </div>
        @foreach($promos as $promo)
        @if($promo->status == '1')
        <div class="col-lg-4"> 
          <div class="trainer-item text-center">
            <div class="image-thumb">
              <img src="{{ asset('uploads/promo/' . $promo->gambar_promo) }}" alt="">
            </div>
            <div class="down-content">
              <span>{!! $promo->diskon_promo !!}</span>
              <h4>{!! $promo->judul_promo !!}</h4>
              <p>{!! $promo->deskripsi !!}</p>
            </div>
          </div>
        </div>
        @endif
        @endforeach        
      </div>
    </div>
  </section>  

  <section class="dark-content portfolio" id="gallery">		
		<div id="portfolio-carousel" class="portfolio-carousel portfolio-holder">
      @foreach($galerys as $galery)
      @if($galery->status == '1')
			<div class="item">
				<div class="thumb-post">
					<img src="{{ asset('uploads/galery/' . $galery->gambar_galery) }}" alt="">
				</div>
			</div> <!-- /.item -->
			@endif
      @endforeach
		</div> <!-- /#owl-demo -->
	</section> <!-- /.portfolio-holder -->

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6 style="font-size: 40px;">Reviews</h6>
            <div class="div-dec"></div>
            <h4>Apa Kata Mereka</h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            @foreach($testis as $testi)
            @if($testi->status == '1')
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>{!! $testi->deskripsi !!}</p>
              <span>{!! $testi->judul_testi !!}</span>
              <div class="right-image">
                <img src="{{ asset('uploads/testi/' . $testi->gambar_testi) }}" alt="">
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section> 

  <section class="map" id="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4225.415132822221!2d106.74235759999999!3d-6.1121265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d942ebe13fb%3A0xcaf3308bccd2999f!2sAyam%20Goreng%20Gacor%20PIK!5e1!3m2!1sid!2sid!4v1690979992134!5m2!1sid!2sid" width="100%" height="450px" frameborder="0" style="border:0; border-radius: 5px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="row">
            <div class="col-lg-4">
              <div class="info-item">
                <i class="fa fa-envelope"></i>
                <h4>Email Address</h4>
                <a href="ayamgorenggacor@gmail.com">ayamgorenggacor@gmail.com</a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="info-item">
                <i class="fa fa-phone"></i>
                <h4>Whatsapp</h4>
                <a href="https://wa.me/685217312554">+628-521-731-2554</a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="info-item">
                <i class="fa fa-map-marked-alt"></i>
                <h4>Address</h4>
                <a href="">PIK Kamal Muara, Jakarta Utara, DKI Jakarta</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 Ayam Goreng Gacor Jakarta Utara, DKI Jakarta
          
          <br>Designed by <a href="https://wa.me/6281290992680" target="_blank">Ky-Project</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('front/js/isotope.min.js') }}"></script>
    <script src="{{ asset('front/js/owl-carousel.js') }}"></script>

    <script src="{{ asset('front/js/tabs.js') }}"></script>
    <script src="{{ asset('front/js/swiper.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script>
        var interleaveOffset = 0.5;

      var swiperOptions = {
        loop: true,
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          progress: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }      
          },
          touchStart: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },
          setTransition: function(speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          }
        }
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
  </body>
</html>