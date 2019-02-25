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
                    <a v-bind:href="produto.comprar" class="btn btn-success btn-large" style="font-weight: bold; font-size: 22px;">COMPRAR</a>
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
            //
        }
    }
</script>
