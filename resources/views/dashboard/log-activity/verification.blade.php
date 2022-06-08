@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User verification
                    <a class="btn btn-primary float-end" href="{{ route('log-activity') }}">List of user</a>
                </div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-12 d-flex justify-content-center">
                            <div style="background-color: grey; width: 500px; height: 400px;" id="reader">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2 d-flex justify-content-center">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="listCameraSelect" class="form-label">Select the camera to use:</label>
                                <div class="input-group">
                                    <select class="form-select" id="listCameraSelect"
                                    aria-label="Example select with button addon">
                                </select>
                                <button id="btnAction" data-scan-status="STOP" class="btn btn-primary" type="button"
                                disabled>
                                Start Scanning
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="scanResultsByDecodedText" class="form-label">Scan Results (Decoded Text)</label>
                        <textarea class="form-control" readonly id="scanResultsByDecodedText" cols="30"
                        rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="scanResultsByDecodedResult" class="form-label">
                            Scan Results (Decoded Result)
                        </label>
                        <textarea class="form-control" readonly id="scanResultsByDecodedResult" cols="30"
                        rows="4"></textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<!-- Modal:start -->
{{-- <div class="modal fade" id="modalConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">User Verification</h5>
            <button id="closeButton" type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-borderless">
                <tr>
                    <th>Name</th>
                    <th>:</th>
                    <td class="text-left">
                        <label id="labelName"></label>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td class="text-left">
                        <label id="labelEmail"></label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button id="cancelButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button id="confirmationButton" type="button" class="btn btn-primary">
                Confirmation
                <div id="progressBar" class="spinner-border spinner-border-sm d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </div>
</div>
</div> --}}
<!-- Modal:end -->

<div class="modal fade" id="modalConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">User Verification</h5>
            <button id="closeButton" type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-borderless">
                <tr>
                    <th>Name</th>
                    <th>:</th>
                    <td class="text-left">
                        <label id="labelName"></label>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td class="text-left">
                        <label id="labelEmail"></label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button id="cancelButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button id="confirmationButton" type="button" class="btn btn-primary">
                Confirmation
                <div id="progressBar" class="spinner-border spinner-border-sm d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </div>
</div>
</div>


@endsection
@push('script-external')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
@endpush

@push('script-internal')
<script>
    $(document).ready(function() {
        const html5QrCode = new Html5Qrcode("reader");
        const configQrCode = {
            fps: 10,
            qrbox: {
                width: 300,
                height: 300
            }
        };
        const modalConfirmation = new bootstrap.Modal($('#modalConfirmation'));
        let cameraId;

        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                cameraId = devices[0].id;
                devices.forEach(function(item, index) {
                    $('#listCameraSelect').append($('<option>', {
                        value: item.id,
                        text: item.label
                    }));
                });
                $('#btnAction').prop("disabled", false);
            } else {
                $('#btnAction').prop("disabled", true);
            }
        }).catch(err => {
            // alert('no camera detected or no permission to access camera!!');
        });


        $('#listCameraSelect').on('change', function() {
            cameraId = this.value;
        });

        $('#btnAction').on('click', function() {
            const scanStatus = {
                START: "START",
                STOP: "STOP"
            }
            let label = $(this).html();
            let dataScanStatus = $(this).attr('data-scan-status');
            if (cameraId) {
                switch (dataScanStatus) {
                    case scanStatus.START:
                    html5QrCode.stop();
                    $('#scanResultsByDecodedText').val("");
                    $('#scanResultsByDecodedResult').val("");
                    $('#listCameraSelect').prop("disabled", false);
                    $(this).addClass('btn-primary');
                    $(this).removeClass('btn-danger');
                    dataScanStatus = scanStatus.STOP;
                    label = "Start Scanning";
                    break;
                    case scanStatus.STOP:

                    html5QrCode.start(
                    cameraId, configQrCode,
                    (decodedText, decodedResult) => {
                        html5QrCode.pause();
                        $('#scanResultsByDecodedText').val(decodedText);
                        $('#scanResultsByDecodedResult').val(JSON.stringify(decodedResult));

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('users.qrcode') }}",
                            data: {
                                qrCode: decodedText
                            },
                            dataType: 'json',
                            success: function(response) {

                                if (response.status === "VALID") {
                                    $('#labelName').text(response.data.name);
                                    $('#labelEmail').text(response.data.email);
                                    modalConfirmation.show();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: response.status,
                                        text: response.message,
                                        allowOutsideClick: false
                                    }).then((result) => {
                                        // when click OK button
                                        if (result.isConfirmed) {
                                            html5QrCode.resume();
                                        }
                                    });
                                }

                                $('#scanResultsByDecodedText').val("");
                                $('#scanResultsByDecodedResult').val("");
                            }
                        });
                    },
                    (errorMessage) => {
                        //   console.warn("An error: " + errorMessage);
                    })
                    .catch((err) => {
                        alert("An error occurred while starting the scan!");
                    });

                    $('#listCameraSelect').prop("disabled", true);
                    $(this).addClass('btn-danger');
                    $(this).removeClass('btn-primary');
                    dataScanStatus = scanStatus.START;
                    label = "Stop Scanning";
                    break;

                    default:
                    break;
                }
                $(this).html(label);
                $(this).attr('data-scan-status', dataScanStatus);
            } else {
                alert('Please select and activate the camera to be used!');
            }
            // console.log(dataScanStatus);
        });

        $("#confirmationButton").on('click', function() {
            $("#progressBar").removeClass("d-none");
            $("#progressBar").addClass("d-inline-block");
            $("#cancelButton").prop('disabled', true);
            $("#closeButton").prop('disabled', true);
            $("#confirmationButton").prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('users.verify') }}",
                data: {
                    email: $('#labelEmail').text().trim()
                },
                dataType: 'json',
                success: function(response) {

                    if (response.status === "VERIFIED") {
                        Swal.fire({
                            icon: 'success',
                            title: response.status,
                            text: response.message,
                            allowOutsideClick: false
                        });
                        $('#labelName').text("");
                        $('#labelEmail').text("");
                        modalConfirmation.hide();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.status,
                            text: response.message,
                            allowOutsideClick: false
                        });
                    }

                },
                complete: function() {

                    $("#progressBar").removeClass("d-inline-block");
                    $("#progressBar").addClass("d-none");
                    $("#cancelButton").prop('disabled', false);
                    $("#closeButton").prop('disabled', false);
                    $("#confirmationButton").prop('disabled', false);

                }
            });
        });


        $('#modalConfirmation').on('hide.bs.modal', function() {
            html5QrCode.resume();
            $('#scanResultsByDecodedText').val("");
            $('#scanResultsByDecodedResult').val("");
            $('#labelName').text("");
            $('#labelEmail').text("");
        })



    });
</script>
@endpush

{{-- @push('script-internal')
<script>
    $(document).ready(function() {
        const html5QrCode = new Html5Qrcode("reader");
        const configQrCode = {
            fps: 10,
            qrbox: {
                width: 300,
                height: 300
            }
        };
        let cameraId;
        const modalConfirmation = new bootstrap.Modal($('#modalConfirmation'));
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                cameraId = devices[0].id;
                devices.forEach(function(item, index) {
                    $('#listCameraSelect').append($('<option>', {
                        value: item.id,
                        text: item.label
                    }));

                });
                $('#btnAction').prop("disabled", false);
            } else {
                $('#btnAction').prop("disabled", true);
            }
        }).catch(err => {
            alert('no camera detected or no permission to access camera!!');
        });


        $('#listCameraSelect').on('change', function() {
            cameraId = this.value;
        });

        $('#btnAction').on('click', function() {
            const scanStatus = {
                START: "START",
                STOP: "STOP"
            }
            let label = $(this).html();
            let dataScanStatus = $(this).attr('data-scan-status');
            if (cameraId) {
                switch (dataScanStatus) {
                    case scanStatus.START:
                    html5QrCode.stop();
                    $('#scanResultsByDecodedText').val("");
                    $('#scanResultsByDecodedResult').val("");
                    $('#listCameraSelect').prop("disabled", false);
                    $(this).addClass('btn-primary');
                    $(this).removeClass('btn-danger');
                    dataScanStatus = scanStatus.STOP;
                    label = "Start Scanning";
                    break;
                    case scanStatus.STOP:

                    html5QrCode.start(
                    cameraId, configQrCode,
                    (decodedText, decodedResult) => {
                        html5QrCode.pause();
                        $('#scanResultsByDecodedText').val(decodedText);
                        $('#scanResultsByDecodedResult').val(JSON.stringify(decodedResult));

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        // $.ajax({
                            //     type: "GET",
                            //     url : {{ url('/admin/users/qrcode') }},
                            //     data : { id : id },
                            //     success : function(data) {
                                //         $("#modal-tampil").html(id);
                                //         return true;
                                //     }
                                // });

                                // $.ajax({
                                    //     type: "POST",
                                    //     url: "{{ route('users.qrcode') }}",
                                    //     data: {
                                        //         qrCode: decodedText
                                        //     },
                                        //     dataType: 'json',
                                        //     success: function(response) {
                                            //         if (response.status === "VALID") {

                                                //             $('#labelName').text(response.data.name);
                                                //             $('#labelEmail').text(response.data.email);
                                                //             modalConfirmation.show();
                                                //         } else {
                                                    //             Swal.fire({
                                                        //                 icon: 'error',
                                                        //                 title: response.status,
                                                        //                 text: response.message,
                                                        //                 allowOutsideClick: false
                                                        //             }).then((result) => {
                                                            //                 // when click OK button
                                                            //                 if (result.isConfirmed) {
                                                                //                     html5QrCode.resume();
                                                                //                 }
                                                                //             });
                                                                //         }

                                                                //         $('#scanResultsByDecodedText').val("");
                                                                //         $('#scanResultsByDecodedResult').val("");
                                                                //     }
                                                                // });
                                                            },
                                                            (errorMessage) => {
                                                                console.warn("An error: " + errorMessage);
                                                            })
                                                            .catch((err) => {
                                                                alert("An error occurred while starting the scan!");
                                                            });

                                                            $('#listCameraSelect').prop("disabled", true);
                                                            $(this).addClass('btn-danger');
                                                            $(this).removeClass('btn-primary');
                                                            dataScanStatus = scanStatus.START;
                                                            label = "Stop Scanning";
                                                            break;

                                                            default:
                                                            break;
                                                        }
                                                        $(this).html(label);
                                                        $(this).attr('data-scan-status', dataScanStatus);
                                                    } else {
                                                        alert('Please select and activate the camera to be used!');
                                                    }
                                                    console.log(dataScanStatus);
                                                });

                                                $('#confirmationButton').on('click', function() {
                                                    $("#progressBar").removeClass("d-none");
                                                    $("#progressBar").addClass("d-inline-block");
                                                    $("#cancelButton").prop('disabled', true);
                                                    $("#closeButton").prop('disabled', true);
                                                    $("#confirmationButton").prop('disabled', true);
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "{{ route('users.verify') }}",
                                                        data: {
                                                            email: $('#labelEmail').text().trim()
                                                        },
                                                        dataType: 'json',
                                                        success: function(response) {

                                                            if (response.status === "VERIFIED") {
                                                                Swal.fire({
                                                                    icon: 'success',
                                                                    title: response.status,
                                                                    text: response.message,
                                                                    allowOutsideClick: false
                                                                });
                                                                $('#labelName').text("");
                                                                $('#labelEmail').text("");
                                                                modalConfirmation.hide();
                                                            } else {
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: response.status,
                                                                    text: response.message,
                                                                    allowOutsideClick: false
                                                                });
                                                            }

                                                        },
                                                        complete: function() {

                                                            $("#progressBar").removeClass("d-inline-block");
                                                            $("#progressBar").addClass("d-none");
                                                            $("#cancelButton").prop('disabled', false);
                                                            $("#closeButton").prop('disabled', false);
                                                            $("#confirmationButton").prop('disabled', false);

                                                        }
                                                    });
                                                });


                                                $('#modalConfirmation').on('hide.bs.modal', function() {
                                                    html5QrCode.resume();
                                                    $('#scanResultsByDecodedText').val("");
                                                    $('#scanResultsByDecodedResult').val("");
                                                    $('#labelName').text("");
                                                    $('#labelEmail').text("");
                                                })



                                            });
                                        </script>
                                        @endpush --}}
