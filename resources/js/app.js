// import './bootstrap';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
 
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

console.log(55);
window.Echo.channel('test')
.listen('test', (e) => {
    console.log("test");
});

var pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true
  });
  
  var channel = pusher.subscribe("test");
  channel.bind('On', function() {
    console.log('ishladi');
  });