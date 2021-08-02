<template>
    <section class="posts">
        <h2 class="text-center mt-5">Elenco Posts</h2>
        <div class="container d-flex">
            <Card v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <Pagination
            :pages="pages"
            :currentPage="currentPage"
            @changePage="saveCurrentPage"
        />
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
            pages: null,
            currentPage: undefined
        };
    },
    methods: {
        getPosts(currentPage = 1) {
            axios
                .get("http://127.0.0.1:8000/api/posts", {
                    params: {
                        page: currentPage
                    }
                })
                .then(res => {
                    this.posts = res.data.data;
                    this.pages = res.data.last_page;
                    this.currentPage = res.data.current_page;
                })
                .catch(err => console.log(err));
        },
        saveCurrentPage(currentPage) {
            this.currentPage = currentPage;
        }
    },
    watch: {
        currentPage() {
            this.getPosts(this.currentPage);
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
