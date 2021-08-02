<template>
    <div class="card">
        <h3>{{ post.title }}</h3>
        <h4>{{ post.author }}</h4>
        <p>{{ textCut }}</p>
        <router-link :to="{ name: 'singlePost', params: { slug: post.slug } }"
            >Vai al post</router-link
        >
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        post: Object
    },
    computed: {
        textCut() {
            if (this.post.content.length > 80) {
                return this.post.content.slice(0, 80) + " ...";
            } else {
                return this.post.content;
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.card {
    padding: 10px;
    width: calc(100% / 4 - 30px);
    margin: 15px;
}
</style>
