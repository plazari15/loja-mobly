<template>
    <div class="none">
        <div class="col s4" v-for="produto in produtos">
            <div class="card" >
                <div class="card-image">

                    <img v-bind:src="produto.cover">
                    <span class="card-title">{{ produto.name}}</span>
                </div>
                <div class="card-content">
                    <p>{{ produto.description }}</p>
                </div>
                <div class="card-action">
                    <a href="#">VISUALIZAR PRODUTO</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['category'],
        data: function(){
            return {
                produtos: [],
                teste: 'OIII',
                cat : this.category
            }
        },
        mounted() {
            console.log(this.cat);
            if(this.cat != undefined){
                axios.get('/api/produtos/'+this.cat)
                    .then((data) => {
                        this.produtos = data.data.data;
                    });
            }else{
                axios.get('/api/produtos')
                    .then((data) => {
                        this.produtos = data.data.data;
                    });
            }
        },
        methods: {
            //
        }
    }
</script>
