@extends('dashboard.layouts.main')
@section('container')
<div class="page-body">
    <div class="container-xl">
        <div class="col-12">
            <div class="card">
                <div class="card-table table-responsive p-3">
                    <table class="table" id="myDashboardProposal">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                <th scope="col">#</th>
                                <th scope="col">Nama UKM</th>
                                <th scope="col">Judul Proposal</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal Prposal</th>
                                <th scope="col">Tanggal diupload</th>
                                <th scope="col">Tanggal diubah</th>
                                <th scope="col">File</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            <caption>
                                Petunjuk
                                <span class="form-help" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<p>ZIP Code must be US or CDN format. You can use an extended ZIP+4 code to determine address more accurately.</p>
                                    <p class='mb-0'><a href=''>USP ZIP codes lookup tools</a></p>
                                    ">?</span>
                                </caption>
                            </thead>
                            <tbody>
                                @foreach($proposal as $prop)
                                {{-- <tr>
                                    <td>{{ $prop['kegiatan_id'] }}</td>
                                </tr> --}}
                                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ukm->nama_ukm }}</td>
                                    <td>{{ $prop->nama_proposal }}</td>
                                    <td>{{ $prop->kegiatan->nama_kegiatan }}</td>
                                    <td>{{ Str::limit(strip_tags($prop->keterangan), 30)  }}</td>
                                    <td>{{ $prop->tgl_proposal }}</td>
                                    <td>{{ \Carbon\Carbon::parse($prop->created_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($prop->updated_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a') }}</td>
                                    <td>{{ $prop->file ?? 'Data kosong' }}</td>
                                    <td>
                                        @if ($prop->status == 0)
                                        <p class="badge bg-warning">Menunggu</p>
                                        @elseif($prop->status == 1)
                                        <p class="badge bg-green">Diterima</p>
                                        @elseif($prop->status == 2)
                                        @php
                                        $komentar = url('/act-komentar?act-ditolak='.$prop->slug);
                                        if ($prop->komentar) {
                                            if ($ukm->status != 0) {
                                                echo '<p class="badge bg-danger">Ditolak</p>
                                                <a href="" class="d-block link-danger" title="Komentar"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="bottom">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <desc>Download more icon variants from https://tabler-icons.io/i/message-report</desc>
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                                                    <line x1="12" y1="8" x2="12" y2="11"></line>
                                                    <line x1="12" y1="14" x2="12" y2="14.01"></line>
                                                </svg>
                                            </a>
                                            ';
                                        }else {
                                            echo '<p class="badge bg-danger">Ditolak</p>
                                            <span title="Komentar terkunci"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" class="d-block text-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/lock</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                                <circle cx="12" cy="16" r="1"></circle>
                                                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                            </svg></span>';
                                        }
                                    }
                                    else {
                                        echo '<p class="badge bg-danger">Ditolak</p>
                                        <small class="text-muted fst-italic">Tidak ada komentar</small>';
                                    }
                                    @endphp
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $url_show = url('/act-detailKegiatan?selengkapnya='.$prop->slug);
                                    if ($ukm->status != 0) {
                                        echo '<div class="dropdown">'.
                                            '<a class="text-muted">
                                                <div class="col-auto">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="" class="dropdown-item">Detail</a>
                                                            <a href="#" class="dropdown-item">Export PDF</a>
                                                            <a href="" class="dropdown-item text-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>';
                                    }else {
                                        echo '<span class="text-danger" title="Akses terkunci"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/lock</desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                            <circle cx="12" cy="16" r="1"></circle>
                                            <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                        </svg></span>';
                                    }
                                    @endphp
                                </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
