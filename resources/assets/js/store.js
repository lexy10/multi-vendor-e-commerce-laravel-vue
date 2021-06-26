import createPersistedState from "vuex-persistedstate";

export default {
    strict: true,
    plugins: [createPersistedState()],
    state: {
        products: [],
        cart: []
    },

    getters: {
        getProductsFormGetters(state) { //take parameter state
            return state.products
        },

        getCartCount(state) {
            return state.cart.length
        },

        getCart(state) {
            return state.cart
        }
    },

    actions: {
        addToCart(context, product){
            const matchingProductIndex = this.state.cart.findIndex((item) => {
                return item.id === product.id;
            });

            if (matchingProductIndex > -1) {
                context.commit('incrementCart', matchingProductIndex)
            } else {
                //product.qty = 1;
                context.commit('addToCart', product)
            }

        },

        removeFromCart(context, product){
            const matchingProductIndex = this.state.cart.findIndex((item) => {
                return item.id === product.id;
            });

            if (this.state.cart[matchingProductIndex].qty <= 1) {
                context.commit('removeFromCart', matchingProductIndex)
            } else {
                context.commit('decrementCart', matchingProductIndex)
            }
        },

        deleteProductFromCart(context, product) {
            context.commit('removeFromCart', product)
        },

        clearCart(context) {
            context.commit('clearCart')
        }
    },

    mutations: {
        products(state, data) {
            return state.products = data
        },

        incrementCart(state, data) {
            return state.cart[data].qty++
        },

        decrementCart(state, data) {
            return state.cart[data].qty--;
        },

        addToCart(state, data) {
            return state.cart.push(data)
        },

        removeFromCart(state, data) {
            return state.cart.splice(data, 1)
        },

        clearCart(state) {
            return state.cart = []
        }
    }
}
