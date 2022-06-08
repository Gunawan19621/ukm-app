@extends('dashboard.layouts.main')
@section('container')
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    @if(Session::has('komentarSuccess'))
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
                            title: 'Perubahan berhasil'
                        })
                    </script>
                    @endif
                    @if($komentar->komentar)
                    <div class="page-pretitle mt-3 d-flex justify-content-between">
                        <a class="ms-3" href="{{ url('/proposal') }}" title="Kembali"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>
                    </a>
                </div>
                <div class="card-body markdown">
                <p>
                        <a href="{{ route('ac-editKomentar',$komentar->id) }}" class="link-secondary"
                            title="Edit komentar"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                <path d="M16 5l3 3"></path>
                            </svg>
                        </a>
                        <form style="margin-top: -46px" class="ms-3" action="{{ route('ac-deleteKomentar',$komentar) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="" name="komentar">
                            <button onclick="return confirm('Hapus komentar ini?')"
                            class="btn btn-link"><svg class="link-secondary" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" title="Hapus komentar"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="4" y1="7" x2="20" y2="7"></line>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg></button>
                    </form>
                </p>
                <p>
                    {!! $komentar->komentar !!}
                    @else
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
                    <div class="page-body">
                        @if(Session::has('komentarSuccessDelete'))
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
                                title: 'Komentar berhasil dihapus'
                            })
                        </script>
                        @endif
                        <div class="container-xl d-flex flex-column justify-content-center">
                            <div class="alert alert-info auto-close" role="alert">
                                <h4 class="alert-heading text-danger">Status ditolak diterapkan!</h4>
                                <p>Pilih "Isi Komentar" untuk menindaklanjuti status <span class="fw-bold text-danger">ditolak</span> (Bersifat wajib!)</p>
                            </div>
                            <div class="empty">
                                <div class="empty-img"><img src="img/nocoment.gif" height="128"  alt="">
                                </div>
                                <p class="empty-title">Tidak ada komentar ditemukan!</p>
                                <p class="empty-subtitle text-muted">
                                    Isi komentar sekarang juga dengan menekan tombol "Isi Komentar"
                                </p>
                                <div class="empty-action">
                                    <a href="{{ route('proposal') }}" class="btn btn-outline-secondary">
                                        Kembali
                                    </a>
                                    <a href="{{ route('ac-editKomentar',$komentar->id) }}" class="btn btn-primary">
                                        Isi Komentar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
