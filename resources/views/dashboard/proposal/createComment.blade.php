@extends('dashboard.layouts.main')
@section('container')

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <div class="mb-3">
                            <form action="{{ url('/ac-updateKomentar?update-proposal='.$proposal->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @error('komentar')
                                <div class="alert alert-danger fade show auto-close" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="komentar" class="form-label">Komentar <span class="form-label-description"><span class="text-muted pull-right" id="count1">0</span>/1000</span></label>
                                <input required id="komentar" type="hidden" name="komentar" value="{{ old('komentar',$proposal->komentar) }}">
                                <trix-editor input="komentar" onkeyup="count_up(this);"></trix-editor>
                                <div class="d-grid gap-2 mx-auto mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($proposal->komentar))
                                        Update Komentar
                                        @else
                                        Tambah Komentar
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function count_up(obj) {
        document.getElementById('count1').innerHTML = obj.value.length;
    }
</script>
@endsection
