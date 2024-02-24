import "./bootstrap";

import VueAxios from "vue-axios";
import axios from "axios";

import { createApp } from "vue";

import App from "./components/App.vue";
import router from "./routes";

createApp(App).use(router).use(VueAxios, axios).mount("#app");
