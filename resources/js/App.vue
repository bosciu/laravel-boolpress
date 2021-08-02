<template>
    <div id="app">
        <Header />
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import Header from "./components/Header/Header";
export default {
    name: "App",
    components: {
        Header
    }
};
</script>

<style scoped lang="scss"></style>
