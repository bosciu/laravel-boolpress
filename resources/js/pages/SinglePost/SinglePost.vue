<template>
    <div id="single-post" class="container py-5" v-if="post">
        <h1 class="text-center pb-5">{{ post.title }}</h1>
        <h2 class="pb-5">Autore : {{ post.author }}</h2>
        <h4 v-if="post.category">
            <span class="badge bg-secondary">{{ post.category.name }}</span>
        </h4>
        <div class="tags" v-if="post.tags.length > 0">
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
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return {
            post: null
        };
    },
    methods: {
        getPost() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then(res => (this.post = res.data))
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
