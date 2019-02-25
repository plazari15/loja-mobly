<template>
    <div class="none">
        <div class="col s4" v-for="produto in produtos">
            <div class="card" >
                <div class="card-image">

                    <img v-bind:src="produto.images[0].url">
                    <span class="card-title">{{ produto.name}}</span>
                </div>
                <div class="card-content">
                    <p>{{ produto.description }}</p>
                </div>
                <div class="card-action">
                    <a href="#">{{ teste }}</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data: function(){
            return {
                produtos: [],
                teste: 'OIII'
            }
        },
        mounted() {
            axios.get('/api/produtos')
                .then((data) => {
                   this.produtos = data.data.data;
                });
        }
    }
</script>
