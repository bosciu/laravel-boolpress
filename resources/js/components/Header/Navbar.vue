<template>
    <nav class="text-center">
        <ul>
            <li>
                <router-link to="/">Home</router-link>
            </li>
            <li>
                <router-link to="/posts">Posts</router-link>
            </li>
            <li>
                <router-link to="/contacts">Contatti</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Navbar"
};
</script>

<style scoped lang="scss">
ul {
    list-style: none;
    li {
        display: inline-block;
        a {
            padding: 10px 15px;
            margin: 0 10px;
            cursor: pointer;
            color: unset;
            &.router-link-exact-active {
                background-color: var(--blue);
            }
        }
    }
}
</style>
