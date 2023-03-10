import Pusher from 'pusher-js';
 
window.Pusher = Pusher;



var pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true
  });
  

  var channel = pusher.subscribe("alert");
  channel.bind("Sms", function() {
    alert("Sms keldi")
    // window.location.href = ""
  });