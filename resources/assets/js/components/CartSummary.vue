<template>
    <div>
        <div id="order_summary" class="order-summary">
            <div v-if="cart.length > 0">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="center"><strong>REMOVE</strong></th>
                        <th class="center"><strong>PRODUCT</strong></th>
                        <th class="center"><strong>QUANTITY</strong></th>
                        <th class="center"><strong>PRICE</strong></th>
                    </tr>
                    </thead>
                    <tr v-for="item in cart" class="rTableRow" :key="item.id">

                        <td class="rTableCell">
                            <button type="button" @click="deleteProduct(item)" id="delete_item" value="" name="delete_item" class="delete_item">X
                            </button>
                        </td>
                        <td class="rTableCell"><img :src="'/storage/product_images/'+item.image_name"
                                                     height="50px" width="50px"> {{ item.name }}
                        </td>

                        <!--quantity-->
                        <!--c[1] is pid and c[3] is order serial-->
                        <td class="rTableCell">
                            <button type="button" id="sub" value="" @click="decrementProduct(item)" class="sub">-</button>
                            <input type="number" disabled id="quantity" style="width:15%" name="" :value="item.qty"/>
                            <button type="button" id="add" value="" @click="incrementProduct(item)" class="add">+</button>
                        </td>

                        <td class="rTableCell">
                            <div id="">
                                {{ item.price * item.qty }} NGN
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="order-col">
                    <div>Shiping</div>
                    <div><strong>FREE</strong></div>
                </div>
                <div class="order-col">
                    <div><strong>TOTAL</strong></div>
                    <div><strong class="order-total" id="totalCost">{{ getCartTotal }} NGN</strong></div>
                </div>
                <div v-if="user == 1" class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2" checked>
                        <label for="payment-2">
                            <span></span>
                            Pay with Paystack
                        </label>
                        <div class="caption">
                            <p>The product Will be delivered within 24 hour of confirmation. We accept only Paystack at this moment.</p>
                            <paystack
                                :amount="this.paystackAmount"
                                :email="this.userdata.email"
                                :paystackkey="paystackkey"
                                :reference="reference"
                                :callback="callback"
                                :close="close"
                                :embed="false"
                                class="primary-btn order-submit"
                            >
                                <i class="fas fa-money-bill-alt"></i>
                                Make Payment
                            </paystack>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="order-col">
                <h3>Your Cart is Empty</h3>
                <a href="/"><input type="button"  class="primary-btn order-submit" value="Order Now"></a>
            </div>

        </div>
    </div>
</template>

<script>
import paystack from "vue-paystack";
export default {
    name: "CartSummary",
    props: ['user', 'userdata', 'token'],
    components: {
        paystack
    },
    data() {
        return {
            paystackkey: "pk_test_4ed81639a6b594392a7ac16503321809d5e8048e", //paystack public key
        }
    },
    computed: {
        cart() {
            return this.$store.getters.getCart
        },
        getCartTotal() {
            return this.cart.reduce((total, product) => {
                return total + product.qty * product.price;
            }, 0)
        },
        paystackAmount() {
            return this.getCartTotal * 100
        },
        reference(){
            let text = "";
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( let i=0; i < 10; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }
    },

    methods: {
        incrementProduct(product) {
            this.$store.dispatch('addToCart', product)
        },

        decrementProduct(product) {
            this.$store.dispatch('removeFromCart', product)
        },

        deleteProduct(product) {
            this.$store.dispatch('deleteProductFromCart', product)
        },
        callback: function(response){
            console.log(response)
            if (response.status == 'success') {
                this.addOrder(response)
            }
        },
        close: function(){
            console.log("Payment closed")
        },
        addOrder(response) {
            axios.post('/api/add-order', {
                user_id: this.userdata.id,
                cart: this.cart,
                order_status: 'Placed',
                payment_status: response.message,
                payment_reference: response.reference,
                price: this.getCartTotal
            })
                .then((resp) => {
                    console.log(resp.data)
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
