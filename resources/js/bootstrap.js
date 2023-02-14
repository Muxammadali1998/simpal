import Pusher from 'pusher-js';
 
window.Pusher = Pusher;



var pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true
  });
  
  //var channel = pusher.subscribe("channel");
  // channel.bind("Control", function() {
  //   alert("Control ishladi")
  //   // window.location.href = ""
  // });
  var channel = pusher.subscribe("test");
  channel.bind("On", function() {
    alert("On ishladi")
    // window.location.href = ""
  });