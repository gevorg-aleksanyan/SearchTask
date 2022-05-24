<template>
<div class="Box">

    <div class="sidebar">
      <Sidebar  @ChangeProduct="ChangeProduct"/>
    </div>

    <div class="table_box">
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
        <pagination :data="links" @pagination-change-page="getResults"></pagination>
    </div>

</div>




</template>


<script>
import Sidebar from "./Sidebar";
export default {
    components:{
        Sidebar,

    },

    data() {
        return {
            laravelData: [],
            links:{},
        }
    },
    mounted() {
        this.getResults();

    },

    methods: {
        getResults(page = 1) {
            axios.get('/api/getProduct?page=' + page)
                .then(response => {
                    this.laravelData = response.data.data;
                    this.links = response.data;

                });
        },
        ChangeProduct(data){
                this.laravelData = data
        },

    },








}
</script>

<style scoped>
.Box{
    width:100%;
    display: flex;
    justify-content: space-between;
}
.sidebar{
    width: 20%;
    height: auto;
    border: solid 1px #8d8b8b;
}
.table_box{
    width: 80%;
}
</style>
