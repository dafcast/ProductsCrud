/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import 'bootstrap';


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
// const $ = require('jquery');


const $ = require('jquery');

window.$ = global.jQuery = $;


import bsCustomFileInput from 'bs-custom-file-input';
bsCustomFileInput.init();


import ('./js/custom.js')
