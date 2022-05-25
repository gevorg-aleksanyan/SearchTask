<template>
<div class="Box">

    <div class="sidebar">
      <Sidebar  @ChangeProduct="ChangeProduct"/>
    </div>

    <div class="table_box">
       <Table :laravelData="laravelData"/>
        <pagination :data="links" @pagination-change-page="getResults"></pagination>
    </div>

</div>




</template>


<script>
import Sidebar from "./Sidebar";
import Table from "./Table";
import Services from "../services/BackService";
export default {
    name:"Home",
    components: {Table,Sidebar},
    data() {
        return {
            laravelData: [],
            links:{}
        }
    },

        methods:{
            async getResults(page = 1) {
                const  data = await Services.getProduct(page)
                this.laravelData = data.data.data;
                this.links = data.data

            },

            ChangeProduct(data){
                this.laravelData = data
            },
        },

        mounted() {
            this.getResults();
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
