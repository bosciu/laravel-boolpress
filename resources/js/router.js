import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Homepage from "./pages/Homepage/Homepage";
import Posts from "./pages/Posts/Posts";
import Contact from "./pages/Contact/Contact";

const router = new VueRouter({
    mode: "history",
    routes: [{
            path: "/",
            name: "home",
            component: Homepage
        },
        {
            path: "/posts",
            name: "posts",
            component: Posts
        },
        {
            path: "/contacts",
            name: "contacts",
            component: Contact
        }
    ]
});

export default router;