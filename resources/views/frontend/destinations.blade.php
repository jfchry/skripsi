@extends('layouts.frontend')

@section('content')

<section class="hero">

    <div class="container text-center">

        <h1 class="display-2 fw-bold">
            Destinations
        </h1>

        <p class="lead">
            Discover the best attractions and experiences in Bukit Lawang.
        </p>

    </div>

</section>

<section class="section-padding">

    <div class="container">

        <div class="row align-items-center mb-5">

            <div class="col-lg-6">
                <img src="https://picsum.photos/900/600?1"
                    class="img-fluid shadow">
            </div>

            <div class="col-lg-6">

                <h2>Orangutan Trekking</h2>

                <p>
                    Orangutan trekking is the most iconic activity in Bukit Lawang.
                    Visitors can explore the rainforest with experienced guides
                    and observe orangutans in their natural habitat.
                </p>

            </div>

        </div>

        <div class="row align-items-center mb-5 flex-lg-row-reverse">

            <div class="col-lg-6">
                <img src="https://picsum.photos/900/600?2"
                    class="img-fluid shadow">
            </div>

            <div class="col-lg-6">

                <h2>Bahorok River</h2>

                <p>
                    The Bahorok River offers tubing and outdoor adventures
                    surrounded by tropical rainforest scenery.
                </p>

            </div>

        </div>

        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="https://picsum.photos/900/600?3"
                    class="img-fluid shadow">
            </div>

            <div class="col-lg-6">

                <h2>Bat Cave</h2>

                <p>
                    Explore natural cave formations and experience one of
                    Bukit Lawang's unique attractions.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection
