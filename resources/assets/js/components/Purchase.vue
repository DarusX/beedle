<template>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Estado</label>
            <select name="state_id" class="form-control" v-model="state_id"v-on:change="getMunicipalities">
                <option v-for="state in states" v-bind:value="state.id">{{state.state}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <select name="municipality_id" class="form-control">
                <option v-for="municipality in municipalities" v-bind:value="municipality.id">{{municipality.municipality}}</option>
            </select>
        </div>
    </form>
</template>
<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                states: [],
                municipalities: [],
                state_id: null,
                municipality_id: null
            }
        }, created: function(){
            axios.get("/json/state/all").then(response => {
                this.states = response.data
            })
        }, methods: {
            getMunicipalities: function(){
                axios.get("/json/state/" + this.state_id).then(response => {
                    this.municipalities = response.data.municipalities
                })

            }
        }
    }
</script>
