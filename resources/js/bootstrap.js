import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
 
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'de456e17773cb4ad86ff',
    cluster: 'mt1',
    forceTLS: true
});

console.log(window.Echo);
window.Echo.channel('test')
.listen('On', (e) => {
    console.log("test");
});