<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center py-3">
            <li
                class="page-item"
                @click="prevPage"
                :class="currentPage == 1 ? 'disabled' : ''"
            >
                <button class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </button>
            </li>
            <li
                class="page-item"
                :class="selectedPage == page ? 'active' : ''"
                v-for="page in pages"
                :key="page"
            >
                <button class="page-link" href="#">{{ page }}</button>
            </li>
            <li
                class="page-item"
                @click="nextPage"
                :class="currentPage == pages ? 'disabled' : ''"
            >
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
        pages: Number,
        currentPage: Number
    },
    methods: {
        nextPage() {
            if (this.currentPage < this.pages)
                this.$emit("changePage", this.selectedPage + 1);
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.$emit("changePage", this.selectedPage - 1);
            }
        }
    },
    computed: {
        selectedPage() {
            return this.currentPage;
        }
    }
};
</script>

<style scoped lang="scss"></style>
