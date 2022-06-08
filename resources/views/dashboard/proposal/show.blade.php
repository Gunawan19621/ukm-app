@extends('dashboard.layouts.main')
@section('container')

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    @if($proposal->status==2 && empty($proposal->komentar))
                    <div class="alert alert-danger text-center" role="alert">
                        <h4 class="alert-heading text-danger fs-3 d-block">ANDA BELUM MENGISI KOMENTAR!</h4>
                        <p><a href="{{ route('ac-editKomentar',$proposal->id) }}">"Isi Komentar"</a> untuk menindaklanjuti status <span class="fw-bold text-danger">ditolak</span> (Bersifat wajib!)</p>
                    </div>
                    @endif
                    <div class="page-pretitle mt-3 d-flex justify-content-between">
                        <a class="ms-3" href="{{ route('proposal') }}" title="Kembali"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>
                    </a>
                    @if(Session::has('ubah-status'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'Data berhasil diubah'
                        })
                    </script>
                    @endif
                    <div class="dropdown" title="Status action" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <a class="me-3"
                        class="dropdown-toggle text-muted"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg></a
                        >
                        <div
                        class="dropdown-menu dropdown-menu-end"
                        >
                        @if($proposal->status!=0)
                        <form action="{{ url('/ac-proposalPending?pending-proposal='.$proposal->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="0" name="status">
                            <button class="dropdown-item link-warning" type="submit">
                                Meunggu<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-loader" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="6" x2="12" y2="3"></line>
                                    <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                                    <line x1="18" y1="12" x2="21" y2="12"></line>
                                    <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                                    <line x1="12" y1="18" x2="12" y2="21"></line>
                                    <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                                    <line x1="6" y1="12" x2="3" y2="12"></line>
                                    <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
                                </svg>
                            </button>
                        </form>
                        @endif
                        @if($proposal->status!=1)
                        <form action="{{ url('/ac-proposalDiterima?diterima-proposal='.$proposal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="1" name="status">
                            <button class="dropdown-item link-success" type="submit">
                                Diterima<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 12l5 5l10 -10"></path>
                                    <path d="M2 12l5 5m5 -5l5 -5"></path>
                                </svg>
                            </button>
                        </form>
                        @endif
                        @if($proposal->status!=2)
                        <form action="{{ url('/ac-proposalDitolak?ditolak-proposal='.$proposal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="2" name="status">
                            <button class="dropdown-item link-danger" type="submit">
                                Ditolak<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body markdown">
                <h1 id="whos-that-then" class="text-center">{{ $proposal->nama_proposal }}</h1>
                <h3 class="card-title mt-5">Status permohonan:
                    @if($proposal->status==0)
                    <span class="d-inline badge bg-warning">Menunggu</span>
                    @elseif($proposal->status==1)
                    <span class="d-inline badge bg-success">Diterima</span>
                    @elseif($proposal->status==2)
                    <span class="d-inline badge bg-danger">Ditolak</span>
                    @if($proposal->komentar > 0)
                    <a title="Terdapat komentar" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" class="position-absolute" href="{{ url('/ac-komentar?ac-ditolak='.$proposal->id) }}"><img style="margin-top: -35px; margin-left:-15px;" width="70" src="img/message.gif" alt=""></a>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler position-absolute link-secondary icon-tabler-message-circle-off" title="Tidak ada komentar" data-bs-toggle="tooltip"
                    data-bs-placement="bottom"width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    style="margin-top: -15px;"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="3" y1="3" x2="21" y2="21"></line>
                    <path d="M8.585 4.581c3.225 -1.181 7.032 -.616 9.66 1.626c2.983 2.543 3.602 6.525 1.634 9.662m-1.908 2.108c-2.786 2.19 -6.89 2.665 -10.271 1.023l-4.7 1l1.3 -3.9c-2.237 -3.308 -1.489 -7.54 1.714 -10.084"></path>
                </svg>
                @endif
                @endif
            </h3>
            <p><small class="text-muted">
                {{ $proposal->kegiatan->nama_kegiatan }}
                |
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                    <line x1="16" y1="3" x2="16" y2="7"></line>
                    <line x1="8" y1="3" x2="8" y2="7"></line>
                    <line x1="4" y1="11" x2="20" y2="11"></line>
                    <rect x="8" y="15" width="2" height="2"></rect>
                </svg>
                {{ \Carbon\Carbon::parse($proposal->tgl_proposal)->isoFormat('dddd, DD MMMM Y HH:mm:ss a'); }}
            </small></p>
            <p>{{  $proposal->keterangan  }}</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
