@extends('dashboard.layouts.main')
@section('container')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <span class="status-indicator status-green status-indicator-animated">
                    <span class="status-indicator-circle bg-danger"></span>
                    <span class="status-indicator-circle bg-danger"></span>
                    <span class="status-indicator-circle bg-danger"></span>
                </span>
            </div>
            <div class="col">
                <h2 class="page-title d-flex justify-content-between">
                    Verification
                        <a class="btn btn-primary" href="{{ route('users.verification') }}">User verification</a>
                </h2>
                <div class="text-muted">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><span class="text-danger">Account verification</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="col-12">
            <div class="card">
                <div class="card-table table-responsive p-3">
                    <table class="table" id="myVerification">
                        <thead>
                            <tr>
                                <th scope="col">ID User</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Email User</th>
                                <th scope="col">Role</th>
                                <th scope="col">Login at</th>
                                <th scope="col">Login Status</th>
                                <th scope="col">Logout at</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
