import Vue from "vue";
import App from "./App.vue";

Vue.config.productionTip = false;

document.addEventListener("DOMContentLoaded", () => {
  new Vue({
    // router,
    // store,
    render: (h) => h(App),
  }).$mount("#app");
});
