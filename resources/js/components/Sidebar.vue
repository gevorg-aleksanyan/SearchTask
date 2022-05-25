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
import Services from "../services/BackService";
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
        async MinChange(){
            const  data = await Services.searchProduct({data: this.form})
            this.SearchData = data.data;
            this.$emit('ChangeProduct',data.data)
        }
    },

}
</script>

<style scoped>

</style>
