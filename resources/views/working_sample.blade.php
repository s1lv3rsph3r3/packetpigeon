<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Packet Pigeon - Sample</title>
</head>
<body>
<p>
    Disclaimer: The views and opinions expressed on this page are those of the users of this service and do not
    necessarily reflect the official policy or position of Packet Pigeon or its affliates.
</p>
<p>
    You should note that other users can call the endpoint so it is possible that you can see other messages from
    other people who are also trialling the service. Messages received on this page do not represent the interests of Packet Pigeon or
</p>
<h1>Watch this space...</h1>
<!-- Embed the package pigeon script here to load a connection -->
<script src="https://cdn.jsdelivr.net/npm/packet-pigeon-client@2.0.0-beta.2/dist/bundle.js"></script>
<script>
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
</script>
</body>
</html>
