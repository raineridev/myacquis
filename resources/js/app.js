import './bootstrap';
import { createApp } from "vue";
import { library } from '@fortawesome/fontawesome-svg-core';
import { faHeart } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import App from "./App.vue";
import '../css/app.css';

library.add(faHeart);
const app = createApp(App);
app.component('font-awesome-icon', FontAwesomeIcon);
app.mount("#app");
