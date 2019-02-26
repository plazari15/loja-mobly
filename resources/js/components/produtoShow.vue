<template>
    <div class="row">
        <div class="col s12" style="padding-top: 5%">
            <div class="col s4">
                <div class="col s12">
                    <img class="materialboxed" width="600" height="400" v-bind:src="produto.cover"></div>
                </div>
            </div>

            <div class="col s8" style="padding-top: 5%">
                <h1>{{ produto.name }}</h1>
                <h4>SKU: {{ produto.sku }}</h4>
                <p>{{ produto.desc }}</p>

                <h4 style="color: #D50000">R$ {{ produto.normal_price }}</h4>

                <div style="margin-top:3%">
                    <a  class="btn btn-success btn-large" v-on:click="addProduto(produto.id)" style="font-weight: bold; font-size: 22px;">COMPRAR</a>
                    <!--v-bind:href="produto.comprar"-->
                </div>
            </div>

        <div class="col s12" style="margin-top: 3%">
            <h2>Descrição do Produto</h2>

            <p>{{ produto.description }}</p>
        </div>
    </div>



</template>

<script>
    export default {
        props: ['produtoid'],
        data: function(){
            return {
                produto: {},
                id: this.produtoid
            }
        },
        mounted() {
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });


            axios.get('/api/produto/'+this.id)
                .then((data) => {
                    this.produto = data.data.data;
                });
        },
        methods: {
            addProduto(id){
                axios.post('/api/produto/add/'+this.id)
                    .then((data) => {
                        console.log('Produto Adicionado Ao Carrinho!');
                    });
            }
        }
    }
</script>
