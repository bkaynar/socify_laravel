@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="d-flex">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ziyaretçiler</h5>
                    <a href="{{route('ziyaretciler')}}" class="btn btn-primary">Ziyaretçi Listesi</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">Taksi Listesi</h5>
                    <a href="{{route('taksi')}}" class="btn btn-primary">Taksi Listesi</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">Taksi Ekle</h5>
                    <a href="{{route('taksi-ekle')}}" class="btn btn-primary">Taksi Ekle</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">Fırsat Ekle</h5>
                    <a href="/firsatekle" class="btn btn-primary">Fırsat Ekle</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">Fırsat Listesi</h5>
                    <a href="/firsatlar" class="btn btn-primary">Fırsat Listesi</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
