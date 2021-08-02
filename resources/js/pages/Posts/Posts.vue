<template>
    <section class="posts">
        <h2 class="text-center mt-5">Elenco Posts</h2>
        <div class="container d-flex">
            <Card v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <Pagination :pages="pages" />
    </section>
</template>

<script>
import Pagination from "../../components/Pagination";
import Card from "./Card";
export default {
    name: "Posts",
    components: {
        Pagination,
        Card
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

<style scoped lang="scss">
.container {
    flex-wrap: wrap;
    justify-content: center;
}
</style>
