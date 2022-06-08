@extends('dashboard.layouts.main')
@section('container')

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="page-pretitle mt-3">
                        <a class="ms-3" href="{{ route('logbook') }}" title="Kembali"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line></svg>
                        </a>
                    </div>
                    <div class="card-body markdown">
                        <h3 class="card-title mt-5">Status logbook
                            @if($logbook->progress==0)
                            <span class="d-inline badge bg-danger">Gagal</span>
                            @elseif($logbook->progress==1)
                            <span class="d-inline badge bg-success">Sukses</span>
                            @elseif($logbook->progress==2)
                            <span class="d-inline badge bg-warning">Sedang bejalan</span>
                            @endif
                        </h3>
                        <p>
                            <small class="text-muted">

                                {{ $ukm->nama_ukm }}
                                |
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                    <line x1="16" y1="3" x2="16" y2="7"></line>
                                    <line x1="8" y1="3" x2="8" y2="7"></line>
                                    <line x1="4" y1="11" x2="20" y2="11"></line>
                                    <rect x="8" y="15" width="2" height="2"></rect>
                                </svg>

                                {{ \Carbon\Carbon::parse($logbook->tgl_logbook)->isoFormat('dddd, DD MMMM Y HH:mm:ss a'); }}
                            </small>
                        </p>
                        <p>
                            <h2>Nama Kegiatan</h2>
                            {{  $logbook->kegiatan->nama_kegiatan  }}
                            <hr>
                            <h2>Deskripsi Logbook</h2>
                            {{  $logbook->uraian  }}
                            <hr>
                            <h2>Hasil</h2>
                            {{ $logbook->hasil }}
                            <hr>
                            <h2>Kendala</h2>
                            {{ $logbook->kendala }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
