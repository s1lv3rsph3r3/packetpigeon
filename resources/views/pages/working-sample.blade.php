@extends('layouts.app')

@section('pageTitle', 'Packet Pigeon - Working Sample')

@section('content')
    <h1 class="text-center">Packet Pigeon - Working Sample</h1>
    <p class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> <strong>Disclaimer:</strong><br>
        The views and opinions expressed on this page are those of the users of this service and do not necessarily reflect the official policy or position of Packet Pigeon or its affiliates. You should note that other users can call the endpoint so it is possible that you can see other messages from other people who are also trialling the service. Messages received on this page do not represent the interests of Packet Pigeon.
    </p>
    <h3>Watch this space...</h3>
    <div class="messages-received">

    </div>
@endsection

@section('extra-js')
    <!-- Embed the package pigeon script here to load a connection -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/packet-pigeon-client@2.0.0-beta.2/dist/bundle.js"></script>
    <script type="text/javascript">
        // Create the new instance of a PacketPigeon
        const packetPigeon = new PacketPigeon();
        // Subscribe to the specific channels that you require
        packetPigeon.subscribe('DEFAULT', 'testing', function evt(data)
        {
            // Do whatever you want with the data of your message

            // In this case we just append the data to the document

            const messagesReceivedElement = document.getElementsByClassName('messages-received')[0];
            const pre = document.createElement("pre");
            const code = document.createElement("code");
            code.classList.add("language-json");
            code.innerHTML = JSON.stringify(data, null, 2);
            hljs.highlightBlock(code);
            pre.appendChild(code);
            messagesReceivedElement.appendChild(pre);
        });
    </script>
@endsection
