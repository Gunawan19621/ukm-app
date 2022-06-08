@extends('dashboard.layouts.main')

@section('container')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    UNIT KEGIATAN MAHASISWA POLITEKNIK NEGERI INDRAMAYU
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a
                    href="#"
                    class="btn btn-primary d-none d-sm-inline-block"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-report"
                    >
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    >
                    <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none"
                    />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Tambah UKM
            </a>
            <a
            href="#"
            class="btn btn-primary d-sm-none btn-icon"
            data-bs-toggle="modal"
            data-bs-target="#modal-report"
            aria-label="Create new report"
            >
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            >
            <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
            />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
    </a>
</div>
</div>
{{-- Modal Start --}}
<div
class="modal modal-blur fade"
id="modal-report"
tabindex="-1"
role="dialog"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">FORM PENDAFTARAN UNIT KEGIATAN MAHASISWA</h5>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <form action="{{ route('ukm.store') }}" id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_ukm" class="form-label">Nama UKM <span class="link-danger">*</span></label>
                    <input
                    type="text"
                    id="nama_ukm"
                    class="form-control @error('nama_ukm')
                    is-invalid
                    @enderror"
                    name="nama_ukm"
                    placeholder="Masukan Nama Lengkap UKM (Bukan Singkatan)"
                    autocomplete="on"
                    autofocus

                    value="{{ old('nama_ukm') }}"
                    />
                    @error('nama_ukm')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span class="link-danger">*</span></label>
                    <input
                    type="text"
                    id="slug"
                    class="form-control @error('slug')
                    is-invalid
                    @enderror"
                    name="slug"
                    placeholder="Terisi Otomatis"
                    readonly
                    value="{{ old('slug') }}"
                    />
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {{-- toggle butotn START --}}
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasRightLabel">Priview Image Logo Upload</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <img class="img-preview img-fluid mb-3 col-sm-3 mx-auto">
                                </div>
                            </div>
                            <label for="logo" class="form-label">Logo UKM
                                <span class="link-danger">* <small class="fst-italic"> (.PNG,.JPG,.JPEG) max:5mb</small>
                                    <a class="fst-italic" href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Lihat Priview</a>
                                </span>
                            </label>
                            <input id="logo" name="logo" type="file" class="form-control
                            @error('logo')
                            is-invalid
                            @enderror"
                            onchange="previewImage()"/>
                            @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="file" class="form-label">File/Dokumen Penting <span class="link-danger">*<small class="fst-italic"> (.PDF,.DOCX,.DOC,.XLSX) max:15mb</small></span>
                            </label>
                            <input id="file" name="file" type="file" class="form-control
                            @error('file')
                            is-invalid
                            @enderror"/>
                            @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="tgl_berdiri" class="form-label">Tanggal Berdiri UKM <span class="link-danger">*</span></label>
                            <input type="date" class="form-control @error('tgl_berdiri')
                            is-invalid
                            @enderror" id="tgl_berdiri" name="tgl_berdiri"/>
                            @error('tgl_berdiri')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label"
                            >Deskripsi <span class="link-danger">* <small class="fst-italic"> (Sejarah,Gambaran singkat, dll)</small></span></label>
                            <textarea class="form-control text-dark @error('deskripsi')
                            is-invalid
                            @enderror" rows="3" id="deskripsi" name="deskripsi"></textarea>
                            @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a
                href="#"
                class="btn btn-link link-secondary"
                data-bs-dismiss="modal"
                >
                Tutup
            </a>
            <button type="submit" id="btnSubmit" name="btnSubmit" class="fw-bolder btn btn-primary ms-auto">
                Tambah UKM
            </button>
        </div>
    </form>
</div>
</div>
</div>
{{-- Modal END --}}
</div>
</div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($ukms as $ukm)
            @if(Session::has('UKM-nonaktif'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'UKM Dinonaktifkan!'
                })
            </script>
            @endif
            @if(Session::has('UKM-aktif'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'UKM Diaktifkan!'
                })
            </script>
            @endif
            <div class="col-sm-6 col-lg-4">
                <div class="card card-sm">
                    @if($ukm->logo)
                    <a href="{{ url('ukm?deskripsi='.$ukm->slug ?? "") }}" class="d-block">
                        <img height="128" class="mx-auto d-block mt-3" src="{{ asset('storage/'.$ukm->logo ?? "") }}" class="card-img-top" alt="{{ $ukm->nama_ukm ?? "" }}">
                    </a>
                    @else
                    <a href="/dashboard" class="d-block">
                        <img height="128" class="mx-auto d-block mt-3 rounded-circle" src="img/noimage.png" alt="{{ $ukm->nama_ukm ?? "" }}">
                    </a>
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="h2">{!! $ukm->nama_ukm ?? '<small class="text-danger fst-italic">Data kosong/error</small>' !!}</div>
                                @if($ukm->status == 0)
                                <span class="badge bg-danger">Nonaktif</span>
                                @else
                                <span class="badge bg-green">Aktif</span>
                                @endif
                            </div>
                            <div class="ms-sm-auto ms-auto">
                                <div class="dropdown">
                                    <a class="text-muted">
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    @if($ukm->status != 0)
                                                    <a href="{{ url('/dashboard/showKegiatan?detail='.$ukm->slug) }}" class="dropdown-item">Detail Kegiatan</a>
                                                    <a href="{{ url('/dashboard/showProposal?detail='.$ukm->slug) }}" class="dropdown-item">Detail Proposal</a>
                                                    <a href="#" class="dropdown-item">Detail Logbook</a>
                                                    <a href="#" class="dropdown-item">Detail Laporan</a>
                                                    <div class="dropdown-divider"></div>
                                                    @endif

                                                    @if($ukm->status != 0)
                                                    <a href="{{ url('/ukm/nonaktif?nonaktifukm='.$ukm->slug) }}" class="dropdown-item text-danger ukm-nonaktif-confirm">Nonakifkan</a>
                                                    @else
                                                    <a href="{{ url('/ukm/aktif?aktifukm='.$ukm->slug) }}" class="dropdown-item text-green ukm-aktif-confirm">Akifkan</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    const nama_ukm = document.querySelector('#nama_ukm');
    const slug = document.querySelector('#slug');

    nama_ukm.addEventListener('change',function(){
        fetch('/dashboard/checkSlug?nama_ukm='+ nama_ukm.value)
        .then(response=>response.json())
        .then(data=>slug.value = data.slug) //dibaca slug adalah nama fieldnya, value adalah isi dari field tersebut dan data yang nama propertynya slug.

    });
</script>
<script>
    function previewImage() {
        // tangkap ke dalam variabel
        const image = document.querySelector('#logo');
        const imgPreview = document.querySelector('.img-preview');

        // merubah display style img
        imgPreview.style.display = 'block';

        // membuat object
        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        // ketika di load
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>
@endsection

