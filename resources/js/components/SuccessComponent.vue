<template>
    <div class="container text-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMVpv043_4BbqyF23sGTrzwE9LE27f3Pf1jA&s" alt="Success">
        <h1>Order Placed Successfully</h1>
        <p>Your order has been placed successfully. You will receive a confirmation email shortly.</p>
    </div>
</template>

<script>
export default {
    name: 'SuccessComponent'
}
</script>

<style scoped>
body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f9fa;
}
.container {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
.container img {
    height: 250px;
    border-radius: 0.5rem;
    margin: 25px;
}
</style>
