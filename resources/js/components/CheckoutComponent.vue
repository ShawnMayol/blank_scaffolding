<template>
    <div class="container">
      <h1>Checkout</h1>
      <b-form @submit.prevent="processCheckout">
        <b-table :items="cartItems" :fields="fields" responsive="sm" :loading="isLoading">
          <template #cell(picture)="data">
            <img :src="data.item.product.prodImageURL" alt="" style="width: 50px; height: auto;">
          </template>
          <template #cell(product)="data">
            {{ data.item.product.prodName }}
          </template>
          <template #cell(quantity)="data">
            {{ data.item.cartQuantity }}
          </template>
          <template #cell(priceEach)="data">
            ₱{{ data.item.cartPriceEach }}
          </template>
          <template #cell(total)="data">
            ₱{{ data.item.cartQuantity * data.item.cartPriceEach }}
          </template>
        </b-table>
        <h3>Total: ₱{{ totalAmount.toFixed(2) }}</h3>
        <b-button type="submit" variant="primary">Proceed to Checkout</b-button>
      </b-form>
      <div v-if="error" class="alert alert-danger mt-3">
        {{ error }}
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        cartItems: [],
        fields: [
          { key: 'picture', label: 'Picture' },
          { key: 'product', label: 'Product' },
          { key: 'quantity', label: 'Quantity' },
          { key: 'priceEach', label: 'Price Each' },
          { key: 'total', label: 'Total' },
        ],
        totalAmount: 0,
        isLoading: true,
        error: null,
      };
    },
    mounted() {
      this.fetchCartItems();
    },
    methods: {
      async fetchCartItems() {
        try {
          const response = await axios.get('/api/cart-items');
          this.cartItems = response.data.cartItems;
          this.totalAmount = response.data.totalAmount;
        } catch (err) {
          this.error = 'Failed to fetch cart items.';
          console.error(err);
        } finally {
          this.isLoading = false;
        }
      },
      async processCheckout() {
        try {
          const response = await axios.post('/api/checkout');
          window.location.href = '/checkout/success';
        } catch (err) {
          this.error = 'Failed to process checkout.';
          console.error(err);
        }
      },
    },
  };
  </script>