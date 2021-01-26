<div class="agileits-services bg-dark mb-2" id="services">
    <div class="container bg-dark">
        <h2 class="heading text-capitalize text-light"> Services </h2>
        <p class="subs mt-4 text-light">Here my services brief, If you interested to know more information about my service, please click More Details button below .</p>
        <div class="agileits-services-row row pt-md-5 pb-5  text-center">
            @foreach($services as $services)
            <div class="col-lg-4  pt-3 pb-3">
                <div class="agileits-services-grids mt-lg-0 mt-md-0 mt-5 bg-secondary">
                    <span class=""><img src="{{asset($services->services_image)}}" class="img-fluid" alt="" height="80" width="80"></span>
                    <h4 class="mt-4 mb-4 text-light">{{$services->services_name}}</h4>
                    <p class="text-light">{{$services->services_description}}</p>

                    <div class="card-footer pt-5">
                        <a href="https://hpfdesigns.com" class="btn btn-primary btn-block" target="_blank">More Details</a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
        <p class="subs mb-4 text-light">Are you interested to see my work samples? Please follow next.</p>
        <a href="#work" class="banner-button btn">My recent work</a>
    </div>
</div>
