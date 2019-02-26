<template>
    <div class="row">
        <div class="col s12" style="padding-top: 5%">
            <h1>Carrinho de Compras <small>(Quantidade de itens: {{ itensQtd }})</small></h1>

            <table class="striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>SubTotal</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="produto in produtos">
                    <td>{{ produto.id }}</td>
                    <td>{{ produto.name }}</td>
                    <td><input type="number" v-model="produto.qtd" v-on:change="changeProduct(produto)" value="2" min="1" style="width: 50px;"></td>
                    <td>{{ (produto.price).toFixed(2) }}</td>
                    <td>{{ (produto.price * produto.qtd).toFixed(2) }}</td>
                    <td><a v-on:click="excluiProduto(produto)" class="btn-danger btn-floating"><i class="fa fa-close"></i></a></td>
                </tr>
                </tbody>
            </table>

            <div class="col s3 offset-s9">
                <table class="striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Valor Total</td>
                        <td>R$ {{ subtotal }}</td>
                    </tr>
                    </tbody>
                </table>

                <a href="" style="margin-top:5%;font-size:22px;" class="btn btn-large btn-success">FINALIZAR COMPRA</a>
            </div>
        </div>
    </div>



</template>

<script>
    export default {
        props: [],
        data: function(){
            return {
                produtos: {},
                itensQtd: '',
                subtotal: ''
            }
        },
        mounted() {
            axios.get('/api/carrinho/')
                .then((data) => {
                    this.produtos = data.data.cart;
                    this.itensQtd = data.data.qtdItens;
                    this.subtotal = data.data.subtotal.toFixed(2);
                });
        },
        methods: {
            changeProduct(produto){
                axios.put('/api/carrinho/mudaProduto', {
                    produto: produto
                })
                    .then((data) => {
                        console.log('sucesso');
                    });
            },
            excluiProduto(produto){
                console.log(exclui);
            }
        }
    }
</script>
