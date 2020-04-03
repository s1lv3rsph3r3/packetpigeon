@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($domainList) == 0)
                <!-- this should say there are no domains listed - add a domain -->
                <div class="no-domain-message-wrapper">
                <div class="vertical-center">There are no domains listed on your account.</div>
                <div class="top-options">
                    <a href="javascript:void(0)" class="btn btn-success">
                        New Domain
                    </a>
                </div>
                </div>
            @else
                <div class="top-options">
                    <a href="javascript:void(0)" class="btn btn-success">
                        New Domain
                    </a>
                </div>
                <!-- this should list all the domains and the channels -->
                @foreach($domainList as $key => $value)
                <div class="domain-card">
                    <div class="card">
                        <div class="card-header">
                            <div class="domain-wrapper">
                                <div class="domain-name">
                                    {{ $key }}
                                </div>
                                <div class="domain-options">
                                    <a href="javascript:void(0)" class="btn btn-success">
                                        <i class="fas fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @foreach($value as $channel)
                                <div class="channel-wrapper">

                                    <div class="channel-name">
                                        <p class="vertical-center">{{ $channel }}</p>
                                    </div>

                                    <div class="options-wrapper vertical-center right-options">
                                        <div class="active-btn channel-option">
                                            <label class="switch" style="margin-bottom: 0;">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="delete-btn channel-option">
                                            <i class="fas fa-trash-alt" style="font-size:28px;color:red"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
