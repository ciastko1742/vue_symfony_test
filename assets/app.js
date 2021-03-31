/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// start the Stimulus application
// import './bootstrap';
//


//console.log('Hello Stimulus! Edit me in assets/controllers/hello_controller.js');

import Vue from 'vue';
import App from './App.vue';

new Vue({
   el: "#app",
   components: {App}
});
