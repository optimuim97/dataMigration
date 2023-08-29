import { createApp } from "vue";
import App from "./views/App.vue"
import Routes from "./utils/routes.js";
import User from "./utils/User";
import AppStorage from "./utils/AppStorage";
import VueSweetalert2 from 'vue-sweetalert2';

/* CSS */
import 'sweetalert2/dist/sweetalert2.min.css';
import '../styles/css/style.css'
import '../styles/modules/bootstrap/css/bootstrap.min.css'
import '../styles/modules/fontawesome/css/all.min.css'

window.User = User;
window.Storage = AppStorage
// window.EventBus = new Vue();

window.axios = require('axios');
const JWTToken = `Bearer ${localStorage.getItem('token')}`

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = JWTToken;

const app = createApp(App);
app
    .use(Routes)
    .use(VueSweetalert2)
    // .use(toast)
    .mount("#app");

export default app;