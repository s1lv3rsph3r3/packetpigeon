@extends('layouts.app')

@section('content')
    <div class="welcome-page">

        <div class="intro text-center my-5">
            <h1 class="text-lg-center">Packet Pigeon</h1>
            <p>A digital service coming to a web application near you.</p>
        </div>

        <!-- The Concept -->
        <div class="section my-5 border-bottom">
            <h2>The Concept</h2>
            <p>
                The concept is simple. Provide realtime updates to the clients using your application without the hassle of having to reload.<br>
                Remove race conditions on updates. All your clients will be in sync. Build the most intuitive applications with events broadcasting.
            </p>
        </div>

        <!-- The Architecture -->
        <div class="section my-5 border-bottom">
            <h2>The Architecture</h2>
            <div class="text-center">
                <img alt="Basic Structure of Packet Pigeon." src="{{ asset('images/basic_structure.png') }}" class="img-fluid">
            </div>
        </div>

        <!-- Installation & Implementation -->
        <div class="section my-5 border-bottom">
            <h2>Installation & Implementation (BETA)</h2>

            <div class="sub-section mb-3 border-bottom">
                <h3>1. Use our built working sample:</h3>
                <div class="alert alert-info font-weight-bold">
                    <i class="fa fa-info-circle"></i> You can play around on our sample page <a href="{{ route('working-sample') }}">Working Sample</a>.
                </div>
                <p><strong><i class="fa fa-paper-plane"></i> Send a request from your terminal to this endpoint with a request body.</strong></p>
                <div class="code-container">
<pre><code class="language-bash">
curl --header "Content-Type: application/json" \
--request POST \
--data '{"channel":"DEFAULT","event":"testing","data":"Hello world"}' \
https://api.packetpigeon.com/api/v1/default/message
</code></pre>
                </div>
            </div>

            <div class="sub-section">
                <h3>2. Running it locally with a HTML snippet:</h3>
                <strong><i class="fa fa-tags"></i> 2.1. Embed the script in a simple HTML page.</strong>
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> You can access this HTML document on <a target="_blank" href="https://github.com/s1lv3rsph3r3/packet-pigeon-client/blob/master/target/index.html">Github</a> or alternatively you can copy and paste.
                </div>
                <div class="code-container">
<pre><code class="language-html">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Title&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;!-- Embed the package pigeon script here to load a connection --&gt;
&lt;script src="https://cdn.jsdelivr.net/npm/packet-pigeon-client@2.0.0-beta.2/dist/bundle.js"&gt;&lt;/script&gt;
&lt;script&gt;
  // Create the new instance of a PacketPigeon
  const packetPigeon = new PacketPigeon();

  // Subscribe to the specific channels that you require
  packetPigeon.subscribe('DEFAULT', 'testing', function evt(data){

    // Do whatever you want with the data of your message

    // In this case we just append the data to the document
    const pre = document.createElement("pre");
    const code = document.createElement("code");
    code.classList.add("language-json");
    code.innerHTML = JSON.stringify(data, null, 2);
    pre.appendChild(code);
    document.body.appendChild(pre);
  });
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>
                </div>

                <strong><i class="fa fa-paper-plane"></i> 2.2. Send a request from your terminal to this endpoint with a request body.</strong>
                <div class="code-container">
<pre><code class="language-bash">
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"channel":"DEFAULT","event":"testing","data":"Hello world"}' \
  https://api.packetpigeon.com/api/v1/default/message
</code></pre>
                </div>

                <p><strong>Realise realtime events in your clients web browsers XD</strong></p>
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i> <strong>Known problems:</strong> By default, browsers, such as Google Chrome don't allow you to send cross-origin requests for security purposes.
                    Since this HTML will be rendered and running on your local machine, I would advise you use a plugin such as: <a href="https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf" target="_blank" rel="nofollow">Allow-Cors-Access-Control</a> for chrome.
                    This allows you to toggle CORS settings for playing around with our service.
                </div>
            </div>
        </div>
    </div>

    <!-- Future Development -->
    <div class="section my-4 border-bottom">
        <h2>Future Development</h2>
        <div>
            <p>
                <b>This is just a beta service for proof of concept. The next stages to follow:</b>
            </p>
            <ul>
                <li>Register Account with PacketPigeon</li>
                <li>Create and maintain public channels within your own account</li>
                <li>Create and maintain private channels within your own account</li>
            </ul>
        </div>
    </div>
@endsection
