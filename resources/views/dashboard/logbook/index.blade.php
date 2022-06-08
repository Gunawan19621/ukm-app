@extends('dashboard.layouts.main')
@section('container')
<div class="container-xl">
    <div class="page-header d-print-none">
      <div class="row g-3 align-items-center">
        <div class="col-md-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="#" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="12 8 12 12 14 14"></polyline>
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                 </svg>
              Riwayat
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Robotika Polindra</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Seni Budaya Polindra</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Komunitas Mahasiswa Pecinta Alam</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Foreign Language Forum</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Persatuan Olahraga Polindra</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Resimen Mahasiswa</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Forum Mahasiswa Bidik Misi</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="subheader">Kotak Pena</div>
              <div class="h3 m-0">33 Logbook</div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-table table-responsive p-3">
              <table class="table" id="myLogbook">
                <thead>
                  <tr>
                    <th>Nama UKM</th>
                    <th>Nama Kegiatan</th>
                    <th>Deskripsi Kegiatan</th>
                    <th>Tanggal Logbook</th>
                    <th>Hasil</th>
                    <th>Kendala</th>
                    <th>Tanggal dibuat</th>
                    <th>Tanggal diubah</th>
                    <th>Status Kegiatan</th>
                    <th></th>
                  </tr>
                  <caption>
                    Petunjuk
                    <span class="form-help" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>ZIP Code must be US or CDN format. You can use an extended ZIP+4 code to determine address more accurately.</p>
                    <p class='mb-0'><a href=''>USP ZIP codes lookup tools</a></p>
                    ">?</span>
                    </caption>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
