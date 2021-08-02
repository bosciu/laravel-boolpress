window.Vue = require("vue");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
import App from "./App";
import router from "./router";
const app = new Vue({
    el: "#root",
    router,
    render: h => h(App)
});