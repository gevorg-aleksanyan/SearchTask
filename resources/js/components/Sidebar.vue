<template>
<div>
    <div class="row">
        <div class="col s6">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" v-model="form.min" id="autocomplete-input" class="autocomplete" @input="MinChange">
                    <label for="autocomplete-input">Min</label>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="autocomplete-input" v-model="form.max" class="autocomplete" @input="MinChange">
                    <label for="autocomplete-input">Max</label>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="input-field col s12">
            <input type="text" id="autocomplete-input" v-model="form.category" class="autocomplete" @input="MinChange">
            <label for="autocomplete-input">Category</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input type="text" id="autocomplete-input" v-model.lazy="form.available" class="autocomplete"  @input="MinChange">
            <label for="autocomplete-input">Availability</label>
        </div>
    </div>


</div>
</template>

<script>

export default {
    name: "Sidebar",
    data() {
        return {
            SearchData:[],
            form:{
                min: '',
                max: '',
                category: '',
                available: '',
            }



        }
    },
    methods:{
        MinChange(){
            console.log(this.form)
            axios.post("/api/searchProduct", {data: this.form})
                .then(response => {
                    this.SearchData = response.data;
                    this.$emit('ChangeProduct',response.data)
                });
        }
    },

}
</script>

<style scoped>

</style>
