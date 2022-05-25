<template>
<div>
    <table class="table"
    >
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">In Store Availability</th>
        </tr>
        </thead>
        <tbody>

        <tr  v-for="product in laravelData" :key="product.id">
            <td>{{product.name}}</td>
            <td>{{product.price}}</td>
            <td>{{product.description}}</td>
            <td>{{product.category.name}}</td>
            <td>{{product.available}}</td>

        </tr>

        </tbody>
    </table>

</div>
</template>

<script>
export default {
    name: "Table",
    props:['laravelData'],

}
</script>

<style scoped>

</style>
