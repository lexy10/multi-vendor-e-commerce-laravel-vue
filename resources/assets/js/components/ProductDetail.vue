<template>
    <div>
        <!-- Product main img -->
        <div class="col-md-5 ">
            <div id="product-main-img">
                <div class="product-preview">
                    <img :src="'/storage/product_images/' + product.image_name " alt="">
                </div>
            </div>
        </div>
        <!-- /Product main img -->


        <!-- Product details -->
        <div class="col-md-5">
            <div class="product-details">
                <h2 class="product-name">{{ product.name }}</h2>
                <div>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div>
                    <h3 class="product-price">NGN {{ product.discount }} <del class="product-old-price">NGN {{ product.price }}</del></h3>
                    <span class="product-available">In Stock</span>
                </div>
                <p v-html="product.description"></p>
                <form id="order_form">
                    <div class="product-options" >
                        <input type="hidden" id="discount_price_holder" name="discount_price_holder" :value="product.discount">
                        <label>
                            <div id="field1">Quantity
                                <button type="button" id="sub" @click="decrementProduct(product)" class="sub">-</button>
                                <input type="number" id="quantity" name="quantity" :value="productQty" min="1"  />
                                <button type="button" id="add" @click="incrementProduct(product)" class="add">+</button>
                            </div>

                        </label>

                    </div>
                    <div id="for_error"></div>

                    <div class="add-to-cart">
                        <button type="button" name="myButton" id="myButton" @click="addToCart(product)" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                </form>
                <ul class="product-links">
                    <li>Category:</li>
                    <li><a :href="'/search?c=' + product.category.id">{{ product.category.name }}</a></li>
                </ul>
            </div>
        </div>
        <!-- /Product details -->
    </div>
</template>

<script>
export default {
    name: "CartDetail",
    props: ['product'],
    data() {
        return {
            productQty : 1
        }
    },

    methods: {
        addToCart(product) {
            product.qty = this.productQty
            this.$store.dispatch('addToCart', product)
        },

        incrementProduct() {
            this.productQty++
        },

        decrementProduct() {
            this.productQty > 1 ? this.productQty-- : null
        }
    }
}
</script>

<style scoped>

</style>
