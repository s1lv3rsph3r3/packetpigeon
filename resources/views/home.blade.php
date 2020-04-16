@extends('layouts.app')

@section('content')
<div class="container">

    @if($errors->any())
    <div class="row alert alert-danger alert-dismissable" style="display: flex; flex-direction: row; justify-content: space-between;">

                    <h7>{{ $errors->first() }}</h7>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- New Domain Modal -->
            <div class="modal fade" data-keyboard="false" data-backdrop="static" id="newDomainModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Domain</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('request.new-domain') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="domain-name" class="col-md-4 col-form-label text-md-right">Domain Name:</label>

                                    <div class="col-md-6">
                                        <input id="domain-name" type="text" spellcheck="false" class="form-control" name="domain" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- New Channel Modal -->
            <div class="modal fade" data-keyboard="false" data-backdrop="static" id="newChannelModal" role="dialog" aria-labelledby="newChannelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newChannelLabel">New Channel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('request.new-channel') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="input-domain" class="col-md-4 col-form-label text-md-right">Domain:</label>

                                    <div class="col-md-6">
                                        <input id="input-domain" type="text" spellcheck="false" class="form-control" name="domain" value="" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="channel-name" class="col-md-4 col-form-label text-md-right">Channel Name:</label>

                                    <div class="col-md-6">
                                        <input id="channel-name" type="text" spellcheck="false" class="form-control" name="channel" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if(count($domainList) == 0)
                <!-- this should say there are no domains listed - add a domain -->
                <div class="no-domain-message-wrapper">
                <div class="vertical-center">There are no domains listed on your account.</div>
                <div class="top-options">
                    <a href="#" onclick="return false;" class="btn btn-success" data-toggle="modal" data-target="#newDomainModal">
                        New Domain
                    </a>
                </div>
                </div>
            @else
                <div class="top-options">
                    <a href="#" onclick="return false" class="btn btn-success" data-toggle="modal" data-target="#newDomainModal">
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
                                    <a href="#" onclick="updateSomething(this);" class="btn btn-success" data-toggle="modal" data-target="#newChannelModal">
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
                                        <!--
                                        <div class="active-btn channel-option">
                                            <label class="switch" style="margin-bottom: 0;">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        -->
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
