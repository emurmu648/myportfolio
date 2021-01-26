<section class="news text-center bg-dark" id="work">
    <div class="container bg-dark">
        <h3 class="heading text-capitalize text-light"> My works </h3>
        <p class="subs mt-4 text-white"> This is my thumbnails of my work sample, for more information please click Find Out More button, it will redirect you on details page.</p>

        <div class="row news-grids mt-5">
            @foreach($projects as $project)

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top pt-1" src="{{asset($project->project_image)}}" alt="" height="200" width="180">
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-light">{{$project->project_name}}</h4>
                            <p class="card-text text-light">{{$project->project_description}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://hpfdesigns.com" class="btn btn-primary" target="_blank">Find Out More!</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>

