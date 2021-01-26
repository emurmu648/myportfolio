<section class="banner-bottom bg-dark  mb-2" id="about">
    <div class="container pt-10">
        <div class="inner-sec">
            <div class="row middle-grids">
                <div class="col-lg-4 advantage-grid-info1">
                    <div class="advantage_left1 text-center">
                        <img src="{{asset($about->about_image)}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 advantage-grid-info">
                    <div class="advantage_left">
                        <h1 class="heading text-capitalize mb-sm-5 mb-4 text-light">Hi. I'm <span>{{$about->about_name}}</span></h1>
                        <p class="mt-4 text-light">{{$about->about_description}}</p>
                        <a href="#services" class="banner-button btn mt-5 scroll">Learn about what i do</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
