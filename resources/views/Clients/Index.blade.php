@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div
                class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Selamat datang di <span>Legit</span> @auth
                    {{ Auth()->user()->name }}
                @endauth </h2>
                <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum
                    quaerat.</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    @auth
                    @else
                        <a href="{{ route('loginIndex') }}" class="btn-get-started">Bergabung dengan kami</a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 d-flex justify-content-center">
                <img src="{{ asset('assets/img/pngegg.png') }}" class="img-fluid" style="max-width:500px; height:500px" alt=""
                    data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>
    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5 d-flex justify-content-center">
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-flag-fill"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-geo-alt"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-command"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

            </div>
        </div>
    </div>

    </div>
</section>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="content px-xl-5">
                        <h3>Pertanyaan yang sering ditanyakan</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    <span class="num">1.</span>
                                    Non consectetur a erat nam at lectus urna duis?
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                    non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                    purus non.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    <span class="num">2.</span>
                                    Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    <span class="num">3.</span>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                    Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                    tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-4">
                                    <span class="num">4.</span>
                                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-5">
                                    <span class="num">5.</span>
                                    Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                                </button>
                            </h3>
                            <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                    est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Layanan Kami</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita labore nisi, fugit corrupti assumenda molestias eos omnis consectetur et? Laudantium?</p>
            </div>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-4 col-md-6">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <h3>Kategori Lelang</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius quas mollitia eos qui magni perspiciatis quaerat aut dolorem temporibus impedit cum ducimus eaque, alias odit veniam, in odio quod officia..</p>
                        <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <h3>Eosle Commodi</h3>
                        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic
                            non ut nesciunt dolorem.</p>
                        <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <h3>Ledo Markt</h3>
                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas
                            adipisci eos earum corrupti.</p>
                        <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->
            </div>

        </div>
    </section><!-- End Our Services Section -->

    

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Kategori</h2>
                <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti
                    fignissimos eos quam</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-1.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Saul Goodman</h3>
                                        <h4>Ceo &amp; Founder</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-2.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Sara Wilsson</h3>
                                        <h4>Designer</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-3.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Jena Karlis</h3>
                                        <h4>Store Owner</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-4.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Matt Brandon</h3>
                                        <h4>Freelancer</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-5.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>John Larson</h3>
                                        <h4>Entrepreneur</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Lelang hari ini</h2>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                <div>
                    <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        @foreach ($categories as $category)
                            <li data-filter=".filter-{{ $category->category }}">{{ $category->category }}</li>
                        @endforeach
                    </ul><!-- End Portfolio Filters -->
                </div>

                <div class="row gy-4 portfolio-container">
                    @foreach ($aucations as $aucation)

                    <div class="col-xl-4 col-md-6 portfolio-item filter-{{ $aucation->item->category->category }}">
                        <div class="portfolio-wrap">
                            <a href="{{ asset($aucation->item->item_main_image) }}" data-gallery="portfolio-gallery-app"
                                class="glightbox"><img src="{{ asset($aucation->item->item_main_image) }}"
                                    class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="{{ route('lelangDetail', $aucation->aucation_id) }}"
                                        title="More Details">{{ $aucation->item->item_name }}</a></h4>
                                <p>Rp {{ number_format($aucation->initial_price, 0, " ", ". ") }}</p>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    @endforeach
                </div><!-- End Portfolio Container -->

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Team</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis
                    dolorem dolore earum</p>
            </div>

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <h4>Walter White</h4>
                        <span>Web Development</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        <h4>Sarah Jhinson</h4>
                        <span>Marketing</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        <h4>William Anderson</h4>
                        <span>Content</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Pricing</h2>
                <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id
                    nobis omnis tiledo stran delop</p>
            </div>

            <div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Free Plan</h3>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                            <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item featured">
                        <h3>Business Plan</h3>
                        <div class="icon">
                            <i class="bi bi-airplane"></i>
                        </div>

                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                            <li><i class="bi bi-check"></i> Pharetra massa massa ultricies</li>
                            <li><i class="bi bi-check"></i> Massa ultricies mi quis hendrerit</li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Developer Plan</h3>
                        <div class="icon">
                            <i class="bi bi-send"></i>
                        </div>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                            <li><i class="bi bi-check"></i> Pharetra massa massa ultricies</li>
                            <li><i class="bi bi-check"></i> Massa ultricies mi quis hendrerit</li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

        </div>
    </section><!-- End Pricing Section -->

    

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Recent Blog Posts</h2>
                <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto
                    accusamus fugit aut qui distinctio</p>
            </div>

            <div class="row gy-4">

                <div class="col-xl-4 col-md-6">
                    <article>

                        <div class="post-img">
                            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Politics</p>

                        <h2 class="title">
                            <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" alt=""
                                class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Maria Doe</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jan 1, 2022</time>
                                </p>
                            </div>
                        </div>

                    </article>
                </div><!-- End post list item -->

                <div class="col-xl-4 col-md-6">
                    <article>

                        <div class="post-img">
                            <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Sports</p>

                        <h2 class="title">
                            <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/blog-author-2.jpg" alt=""
                                class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Allisa Mayer</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 5, 2022</time>
                                </p>
                            </div>
                        </div>

                    </article>
                </div><!-- End post list item -->

                <div class="col-xl-4 col-md-6">
                    <article>

                        <div class="post-img">
                            <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Entertainment</p>

                        <h2 class="title">
                            <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/blog-author-3.jpg" alt=""
                                class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Mark Dower</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 22, 2022</time>
                                </p>
                            </div>
                        </div>

                    </article>
                </div><!-- End post list item -->

            </div><!-- End recent posts list -->

        </div>
    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis
                    dolorem dolore earum</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4">

                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-clock flex-shrink-0"></i>
                            <div>
                                <h4>Open Hours:</h4>
                                <p>Mon-Sat: 11AM - 23PM</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection