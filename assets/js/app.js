import { createApp } from "vue";
import App from "./views/App.vue"
import Routes from "./utils/routes.js";
import User from "./utils/User";
import AppStorage from "./utils/AppStorage";
import VueSweetalert2 from 'vue-sweetalert2';
import Vue3Prism from 'vue3-prism/lib/Vue3Prism.common.js'
import "vue3-prism/lib/Vue3Prism.css"
// import CodeBlock from 'vue3-code-block';

/* CSS */
import 'sweetalert2/dist/sweetalert2.min.css';
import '../styles/css/style.css'
import '../styles/modules/bootstrap/css/bootstrap.min.css'
import '../styles/modules/fontawesome/css/all.min.css'
//import 'highlight.js/styles/default.css' // or other highlight.js theme

window.User = User;
window.Storage = AppStorage
// window.EventBus = new Vue();

window.axios = require('axios');
const JWTToken = `Bearer ${localStorage.getItem('token')}`

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = JWTToken;

const app = createApp(App);
    app
        // .component('CodeBlock', CodeBlock)
        .use(Routes)
        .use(VueSweetalert2)
        .use(Vue3Prism)
        // .use(VueHighlightJS)
        .mount("#app");

export default app;