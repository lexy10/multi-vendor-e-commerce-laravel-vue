<template>
    <div>
        <div class="row">
            <div v-if="loading" style="display: flex; flex-direction: column; align-items: center;">
                <div class="donut" ></div>
            </div>
            <div v-else class="col-md-3" v-for="product in products">
                <div class="product">
                    <a :href="'/product/' + product.id">
                        <div class="product-img">
                            <img :src="'/storage/product_images/' + product.image_name" alt="">
                            <div class="product-label">
                                <span class="sale">Offer!!</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ product.category }}</p>
                            <!--                                    <h3 class="product-name"><a href="{{route('user.view',['id'=>$product->id])}}">{{ product.name }}</a></h3>-->
                            <h4 class="product-price">NGN {{ product.discount }} <del class="product-old-price">NGN {{ product.price }}</del></h4>
                            <div class="product-rating">
                            </div>

                        </div>
                    </a>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn btn-link" @click="addToCart(product)"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->
        </div>
    </div>
</template>

<script>
export default {
    name: "products",
    props: ['products', 'loading'],
    methods: {
        addToCart(product) {
            product.qty = 1;
            this.$store.dispatch('addToCart', product)
        }
    }
}
</script>

<style scoped>

</style>
