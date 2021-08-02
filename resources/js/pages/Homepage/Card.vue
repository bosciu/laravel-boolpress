<template>
    <div class="card">
        <h3>{{ post.title }}</h3>
        <h4>{{ post.author }}</h4>
        <p>{{ post.content }}</p>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        post: Object
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
