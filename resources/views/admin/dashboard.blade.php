@extends('layouts.admin')

@section('content_admin')
<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <h3 class="fw-bold text-success">Selamat Datang di CMS Smart Tourism!</h3>
        <p class="text-muted mb-0">
            Melalui panel ini, Anda dapat mengelola data informasi destinasi wisata Bukit Lawang dan promosi Villa Etalauser Ecoresort secara real-time.
        </p>
    </div>
</div>

<div class="col-md-4 mb-4">
    <div class="card bg-primary text-white shadow h-100 py-2">
        <div class="card-body">
            <div class="small font-weight-bold text-uppercase mb-1">Total Destinasi</div>
            <div class="display-4 fw-bold mb-0">{{ $totalDestinations }}</div>
        </div>
    </div>
</div>

<div class="col-md-4 mb-4">
    <div class="card bg-success text-white shadow h-100 py-2">
        <div class="card-body">
            <div class="small font-weight-bold text-uppercase mb-1">Layanan Villa</div>
            <div class="display-4 fw-bold mb-0">{{ $totalRooms }}</div>
        </div>
    </div>
</div>

<div class="col-md-4 mb-4">
    <div class="card bg-warning text-white shadow h-100 py-2">
        <div class="card-body">
            <div class="small font-weight-bold text-uppercase mb-1">Pesan Masuk</div>
            <div class="display-4 fw-bold mb-0">{{ $totalMessages }}</div>
        </div>
    </div>
</div>
@endsection
