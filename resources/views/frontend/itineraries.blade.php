@extends('layouts.frontend')

@section('content')

<!-- Hero -->
<section class="hero">

    <div class="container text-center">

        <h1 class="display-2 fw-bold">
            Find Your Perfect Journey
        </h1>

        <p class="lead">
            Choose the travel experience that best matches your adventure style in Bukit Lawang.
        </p>

    </div>

</section>


<!-- Intro -->
<section class="section-padding">

    <div class="container text-center">

        <h2 class="fw-bold mb-4">
            Recommended Travel Plans
        </h2>

        <p class="lead mx-auto" style="max-width: 800px;">
            Whether you have one day or several days to explore,
            these itinerary recommendations help you experience
            the best of Bukit Lawang and Gunung Leuser National Park.
        </p>

    </div>

</section>


<!-- Itinerary Packages -->
<section class="pb-5">

    <div class="container">

        <div class="row g-4">

            <!-- 1 Day Trip -->
            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body p-4">

                        <span class="badge bg-success mb-3">
                            BEST FOR FIRST VISIT
                        </span>

                        <h3 class="fw-bold">
                            1 Day Trip
                        </h3>

                        <p class="text-muted">
                            Perfect for travelers with limited time who want to experience the highlights of Bukit Lawang.
                        </p>

                        <hr>

                        <ul class="list-unstyled">

                            <li>✓ Orangutan Trekking</li>
                            <li>✓ River Adventure</li>
                            <li>✓ Local Culinary Experience</li>
                            <li>✓ Nature Exploration</li>

                        </ul>

                    </div>

                </div>

            </div>


            <!-- 2D1N -->
            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body p-4">

                        <span class="badge bg-warning text-dark mb-3">
                            MOST POPULAR
                        </span>

                        <h3 class="fw-bold">
                            2 Days 1 Night
                        </h3>

                        <p class="text-muted">
                            The ideal balance between adventure and relaxation for most visitors.
                        </p>

                        <hr>

                        <ul class="list-unstyled">

                            <li>✓ Jungle Trekking</li>
                            <li>✓ Riverside Activities</li>
                            <li>✓ Village Exploration</li>
                            <li>✓ Overnight Stay</li>

                        </ul>

                    </div>

                </div>

            </div>


            <!-- 3D2N -->
            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body p-4">

                        <span class="badge bg-dark mb-3">
                            FULL EXPERIENCE
                        </span>

                        <h3 class="fw-bold">
                            3 Days 2 Nights
                        </h3>

                        <p class="text-muted">
                            A complete eco tourism adventure designed for nature lovers.
                        </p>

                        <hr>

                        <ul class="list-unstyled">

                            <li>✓ Wildlife Discovery</li>
                            <li>✓ Deep Jungle Experience</li>
                            <li>✓ River Tubing</li>
                            <li>✓ Eco Tourism Activities</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Comparison Section -->
<section class="section-padding bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Which Journey Fits You?
            </h2>

        </div>

        <div class="row text-center g-4">

            <div class="col-md-4">

                <h4>1 Day Trip</h4>

                <p>
                    Suitable for visitors who want a quick but memorable adventure.
                </p>

            </div>

            <div class="col-md-4">

                <h4>2 Days 1 Night</h4>

                <p>
                    Recommended for travelers seeking the most balanced experience.
                </p>

            </div>

            <div class="col-md-4">

                <h4>3 Days 2 Nights</h4>

                <p>
                    Best for visitors who want to fully immerse themselves in nature.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- Villa CTA -->
<section class="section-padding">

    <div class="container text-center">

        <h2 class="fw-bold mb-4">
            Complete Your Journey
        </h2>

        <p class="lead mb-4">
            Enhance your Bukit Lawang experience by staying at
            Villa Etalauser Ecoresort.
        </p>

        <a href="/villa" class="btn btn-success btn-lg">
            Explore Villa Etalauser
        </a>

    </div>

</section>

@endsection
