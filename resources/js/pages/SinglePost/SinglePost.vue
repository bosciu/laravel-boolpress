<template>
    <div>
        <div id="loader" v-if="!isLoaded">Caricamento</div>
        <div
            id="single-post"
            class="container py-5"
            v-else-if="isLoaded && postFind"
        >
            <h1 class="text-center pb-5">{{ post.title }}</h1>
            <h2 class="pb-5">Autore : {{ post.author }}</h2>
            <h4 v-if="post.category">
                <span class="badge bg-secondary">{{ post.category.name }}</span>
            </h4>
            <div class="tags">
                <span
                    class="badge rounded-pill bg-primary"
                    v-for="tag in post.tags"
                    :key="tag.id"
                    >{{ tag.name }}</span
                >
            </div>
            <p>
                {{ post.content }}
            </p>
            <router-link to="/posts" class="btn btn-secondary mt-5"
                >Indietro</router-link
            >
        </div>
        <div id="error" v-else-if="isLoaded && !postFind"><ErrorPage /></div>
    </div>
</template>

<script>
import ErrorPage from "../ErrorPage/ErrorPage";
export default {
    name: "SinglePost",
    data() {
        return {
            post: null,
            isLoaded: false,
            postFind: false
        };
    },
    components: {
        ErrorPage
    },
    methods: {
        getPost() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then(res => {
                    this.post = res.data;
                    if (Object.keys(this.post).length > 0) {
                        this.postFind = true;
                    }
                    this.isLoaded = true;
                })
                .catch(err => console.log(err));
        }
    },
    created() {
        this.getPost();
    }
};
</script>

<style scocped lang="scss">
.tags {
    padding: 30px 0;
    .badge {
        display: inline-block;
        margin-right: 10px;
        font-size: 130%;
    }
}
</style>
