<template>
    <div class="card">
        <h3>{{ textCut(post.title, 40) }}</h3>
        <div class="img-container">
            <img :src="post.cover" :alt="post.title" />
        </div>
        <h4>{{ post.author }}</h4>
        <p>{{ textCut(post.content, 80) }}</p>
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
    methods: {
        textCut(string, length) {
            if (string.length > length) {
                return string.slice(0, length) + "...";
            } else {
                return string;
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
    .img-container {
        width: 100%;
        height: 200px;
        margin: 20px 0;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }
    h3 {
        height: 100px;
    }
}
</style>
