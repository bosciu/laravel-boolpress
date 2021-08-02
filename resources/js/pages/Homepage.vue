<template>
    <div>
        <h1 class="text-center py-5">Boolpress</h1>
        <Navbar />
        <Main :posts="posts" :pages="pages" />
    </div>
</template>

<script>
import Navbar from "../components/Navbar";
import Main from "./main/Main";
export default {
    name: "Homepage",
    components: {
        Navbar,
        Main
    },
    data() {
        return {
            posts: [],
            pages: null
        };
    },
    methods: {
        getPosts() {
            axios
                .get("http://127.0.0.1:8000/api/posts")
                .then(res => {
                    this.posts = res.data.data;
                    this.pages = res.data.last_page;
                })
                .catch(err => console.log(err));
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style scoped lang="scss"></style>
