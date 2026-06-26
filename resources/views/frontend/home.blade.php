@extends('layouts.frontend')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark bg-opacity-75">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Bukit Lawang
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link" href="#journey">Journey</a></li>
                <li class="nav-item"><a class="nav-link" href="#villa">Villa</a></li>
                <li class="nav-item"><a class="nav-link" href="#discover">Discover</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <p class="text-uppercase fw-bold text-success">
                    Smart Tourism Platform
                </p>
                <h1 class="display-2 fw-bold">
                    Explore Bukit Lawang
                </h1>
                <p class="lead mt-4">
                    Discover orangutans, rainforest adventures, river experiences and eco tourism in the heart of Gunung Leuser National Park.
                </p>
                <a href="/destinations" class="btn btn-success btn-lg mt-3">
                    Explore Destinations
                </a>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section-padding py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">
            Gateway to Gunung Leuser National Park
        </h2>
        <p class="lead mx-auto" style="max-width: 800px;">
            Bukit Lawang is one of Indonesia's most iconic eco tourism destinations, known for its orangutan conservation, rainforest trekking, and riverside adventures.
        </p>
        <a href="/guides" class="btn btn-success mt-2">
            View Travel Guide
        </a>
    </div>
</section>

<section id="experience" class="section-padding bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Experience Bukit Lawang</h2>
                <h3 id="experience-title" class="h4 text-muted">Orangutan Trekking</h3>
                <p id="experience-description">
                    Explore the rainforest with local guides and observe orangutans in their natural habitat.
                </p>
                <a href="/destinations" class="btn btn-success">
                    Explore Experiences
                </a>
            </div>

            <div class="col-lg-7">
                <div id="experienceCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200" class="d-block w-100 rounded shadow" alt="Orangutan in Sumatra">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100 rounded shadow" alt="Tropical river landscape">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=1200" class="d-block w-100 rounded shadow" alt="Lush rainforest canopy">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#experienceCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#experienceCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="journey" class="section-padding py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Find Your Perfect Journey</h2>
            <p class="text-muted">Choose the travel experience that suits you best.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h3 class="h5 fw-bold">1 Day Trip</h3>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li><strong>08.00</strong> Arrival</li>
                            <li><strong>09.00</strong> Orangutan Trekking</li>
                            <li><strong>12.00</strong> Lunch</li>
                            <li><strong>14.00</strong> River Tubing</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h3 class="h5 fw-bold">2D1N Adventure</h3>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Day 1</strong> Trekking</li>
                            <li><strong>Day 1</strong> River Activity</li>
                            <li><strong>Day 2</strong> Village Tour</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h3 class="h5 fw-bold">3D2N Explorer</h3>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li>Extended Trekking</li>
                            <li>Camping Experience</li>
                            <li>Wildlife Observation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="/itineraries" class="btn btn-success btn-lg">
                Explore All Itineraries
            </a>
        </div>
    </div>
</section>

<section id="villa" class="section-padding bg-dark text-white py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Villa Etalauser Ecoresort</h2>
            <p class="lead text-light text-opacity-75">Escape into nature while enjoying modern comfort.</p>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200" class="img-fluid rounded shadow" alt="Villa Etalauser Resort front view">
            </div>

            <div class="col-lg-6">
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark bg-gradient">
                            🛏 Comfortable Rooms
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark bg-gradient">
                            🌿 Nature View
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark bg-gradient">
                            🍽 Restaurant
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark bg-gradient">
                            📶 Free WiFi
                        </div>
                    </div>
                </div>
                <a href="/villa" class="btn btn-success">
                    Discover The Resort
                </a>
            </div>
        </div>
    </div>
</section>

<section id="discover" class="section-padding bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Discover More</h2>
            <p class="lead text-muted">Explore more experiences and hidden gems around Bukit Lawang.</p>
        </div>

        <div id="discoverCarousel" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Orangutan Trekking">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                        <h2>Orangutan Trekking</h2>
                        <p>Discover wildlife experiences in the heart of Gunung Leuser National Park.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="River Adventure">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                        <h2>River Adventure</h2>
                        <p>Enjoy the beauty of Bahorok River surrounded by tropical rainforest.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Natural Exploration">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                        <h2>Natural Exploration</h2>
                        <p>Explore caves, forests, and unique landscapes.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Resort Highlight">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                        <h2>Villa Etalauser Ecoresort</h2>
                        <p>Stay comfortably while experiencing the beauty of nature.</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#discoverCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#discoverCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section class="section-padding bg-white py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Contact Information</h2>
        <p class="mb-1">Bukit Lawang, Langkat, North Sumatra</p>
        <p class="mb-1">Email: <a href="mailto:info@bukitlawang.com" class="text-success text-decoration-none">info@bukitlawang.com</a></p>
        <p class="mb-0">Phone: <a href="tel:+6281234567890" class="text-success text-decoration-none">+62 812-3456-7890</a></p>
    </div>
</section>

<footer class="bg-dark text-white-50 py-4 border-top border-secondary">
    <div class="container text-center">
        <h5 class="text-white">Smart Tourism Bukit Lawang</h5>
        <p class="mb-0">Explore Nature • Adventure • Eco Tourism</p>
    </div>
</footer>

@endsection
