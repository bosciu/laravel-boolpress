<template>
    <main class="container">
        <h2 class="text-center mt-5">Elenco Posts</h2>
        <div class="card-container">
            <Card v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <Pagination :pages="pages" />
    </main>
</template>

<script>
import Card from "./card/Card";
import Pagination from "../../components/Pagination";
export default {
    name: "Main",
    components: {
        Card,
        Pagination
    },
    props: {
        posts: Array,
        pages: Number
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
