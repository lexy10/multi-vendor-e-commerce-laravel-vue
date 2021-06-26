<template>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top Products</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <products :products="products" :loading="loading"/>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>
</template>

<script>
export default {
    name: "productHome",
    data() {
        return {
            products: [],
            loading: true
        }
    },

    mounted() {
        this.loadProducts()
    },

    methods: {
        loadProducts() {
            // load products from API
            axios.get('/api/products')
                .then((resp) => {
                    this.products = resp.data.data
                    this.loading = false
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
