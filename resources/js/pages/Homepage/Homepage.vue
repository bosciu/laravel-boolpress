<template>
    <section class="posts">
        <h2 class="text-center mt-5">Elenco Posts</h2>
        <div class="card-container">
            <Card v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <Pagination :pages="pages" />
    </section>
</template>

<script>
import Pagination from "../../components/Pagination";
import Card from "./Card";
export default {
    name: "Homepage",
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
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
</style>
