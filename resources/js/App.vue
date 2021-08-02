<template>
    <div id="app">
        <Header />
        <main>
            <Homepage />
        </main>
    </div>
</template>

<script>
import Header from "./components/Header/Header";
import Homepage from "./pages/Homepage/Homepage";
export default {
    name: "App",
    components: {
        Header,
        Homepage
    }
};
</script>

<style scoped lang="scss"></style>
