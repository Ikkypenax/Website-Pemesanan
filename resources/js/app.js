import './bootstrap';
// resources/js/app.js
// require('./bootstrap');

// import Vue from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';
// import 'bootstrap/dist/css/bootstrap.min.css';

// Vue.component('example-component', ExampleComponent);

// new Vue({
//     el: '#app',
// });
import ScrollReveal from 'scrollreveal';
document.addEventListener('DOMContentLoaded', function () {
    const sr = ScrollReveal({
        origin: 'bottom', // Atur asal animasi (top, right, bottom, left)
        distance: '50px', // Jarak animasi
        duration: 600, // Durasi animasi dalam milidetik
        delay: 200, // Delay sebelum animasi dimulai
        easing: 'ease-in-out', // Jenis easing
        reset: true // Mengulangi animasi saat scroll kembali
    });

    // Pilih elemen yang ingin dianimasikan
    sr.reveal('.reveal', {
        interval: 200 // Jarak antar animasi jika ada banyak elemen
    });
});
