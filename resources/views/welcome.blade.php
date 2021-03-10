<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Packet Pigeon (BETA)</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dist/css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/agate.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Packet Pigeon</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .full-height {
            height: 330vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .flex-left {
            text-align: left;
            align-items: flex-start;
            display: flex;
            flex-direction: column;
            justify-content: left;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            margin-left: 15%;
            margin-right: 15%;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .status {
            color: #28a745;
            background-color: transparent;
            background-image: none;
            border-color: #28a745;
        }

        .status-flash {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .blink_me {
            animation: blinker 3s linear infinite;
        }

        @keyframes blinker {
            0% {
                color: #28a745;
                background-color: transparent;
                background-image: none;
                border-color: #28a745;
            }
            /*50% {*/
            /*    opacity: 0;*/
            /*}*/
            50% {
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            }
            100% {
                color: #28a745;
                background-color: transparent;
                background-image: none;
                border-color: #28a745;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="navbar-brand" href="#">Service Status: <div style="cursor: default;" class="btn blink_me my-2 my-sm-0" type="submit">Pre - Launch</div></div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <div class="title m-b-md">
            Packet Pigeon
        </div>
        <div class="links">
            <p>A digital service coming to a web application near you</p>
        </div>

        <h2 style="text-align: left;">The Concept</h2>
        <div style="text-align: left">
            <p>
                The concept is simple.
                Provide realtime updates to the clients using your application without the hassle of having to reload.
                Remove race conditions on updates. All your clients will be in sync. Build the most intuitive applications with events
                broadcasting.
            </p>
        </div>
        <h2 style="text-align: left;">The Architecture</h2>
        <div>
            <img src="basic_structure.png" width="100%" height="auto"/>
        </div>
        <h2 style="text-align: left;">Installation & Implementation (BETA)</h2>
        <div style="text-align: left;">
            <ol>
                <li>
                    <b>Embed the script in a simple HTML page</b>
                    <pre>
                                <code style="border-radius: 25px;" class="language-html">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Title&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;script&gt;
    // Create the new instance of a PacketPigeon
    var packetPigeon = new PacketPigeon();

    // Subscribe to the specific channels that you require
    packetPigeon.subscribe('ExampleChannel', 'ExampleEvent', function evt(){
        console.log('This is the ExampleEvent on ExampleChannel');
    });

    packetPigeon.subscribe('ExampleChannel', 'ExampleEvent2', function evt2(){
        console.log('This is the ExampleEvent2 on ExampleChannel');
    });

    /* At present, all data passed through these events will be logged in the console */
&lt;/script&gt;
&lt;!-- Embed the package pigeon script here to load a connection --&gt;
&lt;script type="application/javascript" src="../dist/bundle.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
                                </code>
                            </pre>
                </li>
                <li>
                    <b>Send a request from your terminal request to this endpoint with a request body.</b>
                    <pre>
                                <code class="language-bash" style="border-radius: 15px;">
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"channel":"DEFAULT","event":"test-event","data":"Hello world"}' \
  https://api.packetpigeon.com
                                </code>
                            </pre>
                </li>
                <li>
                    <b>Realise realtime events in your clients web browsers XD</b>
                </li>
            </ol>
        </div>

        <h2 style="text-align: left;">Future Development</h2>
        <div style="text-align: left;">
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

</main><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="application/javascript">
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    });
</script>
</body>
</html>

