<template>
    <div>
        <a class="dropdown-toggle text-center" style="color: #fff" id="custom_shopping_cart" :href="this.cartRoute">
            <div><i class="fa fa-shopping-cart"></i> {{ cartCount }}</div>
            <div>Your Cart</div>
        </a>
    </div>
</template>

<script>
export default {
    name: "CartCount",
    props: ['cartRoute'],
    data() {
        return {

        }
    },
    computed: {
        cartCount() {
            return this.$store.getters.getCartCount
        }
    }
}
</script>

<style scoped>

</style>
