@extends('layout.master')

@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-end mb-2 mb-md-0">
                                            <i data-feather="inbox" class="text-muted me-2"></i>
                                            <h4 class="me-1">BKYS Kalite Memnuniyet</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="email-list">
                                <div class="email-list-item email-list-item">
                                    <a href="{{ url('/email/read') }}" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Cedric Kelly</span>
                                            <p class="msg">Urgent - You forgot your keys in the class room, please come
                                                imediatly! </p>
                                        </div>
                                        <span class="date">08 Jan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
