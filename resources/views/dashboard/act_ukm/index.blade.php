@extends('dashboard.layouts.main')
@section('container')
<div class="page-body">
    <div class="container-xl">
        <div class="col-12">
            <div class="card">
                <div class="card-table table-responsive p-3">
                    <table class="table" id="myKegiatan">
                        <thead>
                            <tr>
                                <th scope="col">UKM</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Deskripsi Kegiatan</th>
                                <th scope="col">Tanggal Kegiatan</th>
                                <th scope="col">Tanggal diupload</th>
                                <th scope="col">Tanggal diubah</th>
                                <th scope="col">File</th>
                                <th scope="col">status</th>
                                <th scope="col"></th>
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
    @endsection
