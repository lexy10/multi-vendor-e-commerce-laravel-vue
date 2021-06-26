<template>
    <div>
        <ul class="main-nav nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li v-for="category in categories" class=""><a
                :href="'/category/' + category.id">{{ category.name }}</a></li>

            <li><a href="/products">All Products</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "categories",
    data() {
        return {
            categories: [],
        }
    },

    mounted() {
        this.loadCategories()
    },

    computed: {
        currentRoute() {
            return this.$route.name;
        }
    },

    methods: {
        loadCategories() {
            // load products from API
            axios.get('/api/categories')
                .then((resp) => {
                    this.categories = resp.data.data
                    //this.loading = false
                })
                .catch((err) => {
                    console.log(err)
                })
        }
    }
}
</script>

<style scoped>

</style>
