<template>
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Categorías
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li v-for="category in categories">
                    <a v-bind:href="'/categorias/' + category.category">{{category.category}}</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Marcas
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li v-for="brand in brands">
                    <a v-bind:href="'/marcas/' + brand.brand">{{brand.brand}}</a>
                </li>
            </ul>
        </li>
    </ul>
</template>
<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                categories: [],
                brands: []
            }
        }, created: function(){
            axios.get("/json/category/all").then(response => {
                this.categories = response.data
            })
            axios.get("/json/brand/all").then(response => {
                this.brands = response.data
            })
        }
    }

</script>