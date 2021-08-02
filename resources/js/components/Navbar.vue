<template>
    <nav class="text-center">
        <ul>
            <li>Home</li>
            <li>Chi siamo</li>
            <li>Contatti</li>
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
        padding: 10px 15px;
        margin: 0 10px;
        background-color: var(--blue);
        cursor: pointer;
    }
}
</style>
