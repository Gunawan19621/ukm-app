@extends('dashboard.layouts.main')
@section('container')

  <div class="page-body">
    <div class="container-xl">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
          <div class="card card-lg">
            <div class="card-body markdown">
                @if($ukm->logo)
                <img src="{{ asset('storage/'.$ukm->logo) }}" alt="{{ $ukm->nama_ukm }}" class="col-5 mb-3 img-fluid mx-auto d-block rounded-circle" title="{{ $ukm->slug }}">
                @else
                <img src="img/noimage.png" alt="No Image Preview" class="col-5 mb-3 img-fluid mx-auto d-block rounded-circle" title="No Image Preview">
                @endif
              <h1 id="whos-that-then" class="text-center">{{ $ukm->nama_ukm }}</h1>
              <p>{!! $ukm->deskripsi !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
