<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('34804ad7943716f2a913', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('message1');
    channel.bind('success', function(data) {
      if (data && data.message.donor_name &&  data.message.donor_amount) {
        toastr.success('New Donation Added', 'Donor Name: ' + data.message.donor_name + '<br>Donation Amount: ' + data.message.donor_amount, {
          timeOut: 0,  
          extendedTimeOut: 0,  
        });
      } else {
        console.error('Invalid data structure received:', data);
      }
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>