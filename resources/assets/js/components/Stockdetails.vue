<template>
    <div>       
        <div class="row">
            <div class="col-md-8 text-right mb-sm">
                <span v-if="inputs.length">Total Items type: {{inputs.length}} and Total Items: {{stock}}                	
                </span>
            </div>
        </div>
        <ul id="stock-add">
          <li v-for="(input, index) in inputs" class="mb-sm">
             <input v-if="input.id" class="hidden" :name="'details['+index+'][id]'" :value="input.id"></input>
            <div class="row"> 
                <div class="col-md-3">
                    <input class="col-md-1 form-control" placeholder="Name of Medicine" :name="'details['+index+'][medicine_name]'" v-model="input.medicine_name" @change="countTotal" min="0">
                </div>
                <div class="col-md-2">
                    <input class="col-md-1 form-control" placeholder="Time to take medicine" :name="'details['+index+'][when_take_medicine]'" v-model="input.when_take_medicine" @change="countTotal" min="0">
                </div>
                <div class="col-md-2">
                    <input class="col-md-2 form-control" placeholder="Days" :name="'details['+index+'][medicine_duration]'" v-model="input.medicine_duration" min="0">
                    
                </div>
                <div class="col-md-3">
                    <input class="col-md-2 form-control" placeholder="Suggestions" :name="'details['+index+'][suggetions]'" v-model="input.suggetions" min="0">
                    
                </div>
                <div class="col-md-2">        
                    <button v-if="index" class="btn btn-danger" @click="deleteRow(index,$event);">Delete</button>
                </div>
            </div>
          </li>
        </ul>
        <div class="row">
            <div class="col-md-offset-10 col-md-8">
                 <button class="btn btn-success" @click="addRow">Add More</button>
            </div>           
        </div>        
    </div>
</template>
<script>
    export default {
         data() {
            return {
                inputs:[{
                    brand_id: '',
                    size_id: '',
                    qty: '',
                    unit_price: '' 
                }],
                stock:0
            }
        },           
        mounted() {  
            if(this.details.length){
                this.inputs=this.details;
                this.countTotal();
            }
        },
         props: {
           brands: Object,
           sizes: Object,
           details: Array
        },
        methods: {
            addRow(event) {
              event.preventDefault();
              this.inputs.push({
                    brand_id: '',
                    size_id: '',
                    qty: '',
                    unit_price: '' 
                });
               //$(".select2").select2({allowClear: true});
            },
            countTotal(){
                let add=0;
               this.inputs.forEach(function (value, key) {                   
                    if (!isNaN(parseFloat(value.qty)) && isFinite(value.qty)) {
                        add += parseInt(value.qty);
                    }                    
               });
               this.stock=add;
            },
            deleteRow(index,event) {
                event.preventDefault();
                this.inputs.splice(index,1);
                this.countTotal();
            }
        }
}
</script>
<style>
    #stock-add{
        list-style: none;
    }    
</style>
