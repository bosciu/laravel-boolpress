<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center py-3">
            <li class="page-item">
                <button class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </button>
            </li>
            <li class="page-item" v-for="(page, index) in pages" :key="index">
                <button class="page-link" href="#">{{ page }}</button>
            </li>
            <li class="page-item">
                <button class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </button>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        pages: Number
    }
};
</script>

<style scoped lang="scss"></style>
