<template>
        <div class="col s12">
            <h1>Dados Pessoais</h1>
            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosPessoais.cpfcnpj" id="nome" type="text" class="validate">
                <label for="nome">CPF/CNPJ</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.email" id="email" type="text" class="validate">
                <label for="email">Email</label>
            </div>

            <div class="input-field col s2">
                <input placeholder="Placeholder" v-model="dadosPessoais.ddd_cel" id="email" type="text" class="validate">
                <label for="email">DDD</label>
            </div>

            <div class="input-field col s4">
                <input placeholder="Placeholder" v-model="dadosPessoais.celphone" id="email" type="text" class="validate">
                <label for="email">Celular</label>
            </div>


            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.rg" id="email" type="text" class="validate">
                <label for="email">RG</label>
            </div>


            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.nome" id="nome" type="text" class="validate">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder"  v-model="dadosPessoais.sobrenome" id="sobrenome" type="text" class="validate">
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.cep" v-on:blur="getCepPessoal()" id="CEP" type="text" class="validate">
                <label for="CEP">CEP</label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosPessoais.endereco" id="CEP" type="text" class="validate">
                <label for="CEP">Endereço</label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosPessoais.bairro" id="CEP" type="text" class="validate">
                <label for="CEP">Bairro</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.numero" id="CEP" type="text" class="validate">
                <label for="CEP">Numero</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosPessoais.complemento" id="CEP" type="text" class="validate">
                <label for="CEP">Complemento </label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosPessoais.cidade" id="CEP" type="text" class="validate">
                <label for="CEP">Cidade </label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosPessoais.estado" id="CEP"  type="text" class="validate">
                <label for="CEP">Estado </label>
            </div>

            <div class="input-field col s12"><h1>Dados de Faturamento</h1></div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosFaturamento.cep" v-on:blur="getCepFat()" id="CEP" type="text" class="validate">
                <label for="CEP">CEP</label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosFaturamento.endereco" id="CEP" type="text" class="validate">
                <label for="CEP">Endereço</label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosFaturamento.bairro" id="CEP" type="text" class="validate">
                <label for="CEP">Bairro</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder" v-model="dadosFaturamento.numero" id="CEP" type="text" class="validate">
                <label for="CEP">Numero</label>
            </div>

            <div class="input-field col s6">
                <input placeholder="Placeholder"  v-model="dadosFaturamento.complemento" id="CEP" type="text" class="validate">
                <label for="CEP">Complemento </label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosFaturamento.cidade" id="CEP" type="text" class="validate">
                <label for="CEP">Cidade </label>
            </div>

            <div class="input-field col s12">
                <input placeholder="Placeholder" v-model="dadosFaturamento.estado" id="CEP" type="text" class="validate">
                <label for="CEP">Estado </label>
            </div>


            <div class="input-field col s12"><h1>Dados de pagamento</h1></div>

            <p>
                <label>
                    <input name="pagamento" type="radio" checked />
                    <span>Boleto</span>
                </label>
            </p>

            <p>
                <label>
                    <input name="pagamento" type="radio" checked />
                    <span>Cartão</span>
                </label>
            </p>

            <div class="col s12" id="cartao">
                <div class="input-field col s12">
                    <input placeholder="Placeholder" id="CEP" type="text" class="validate">
                    <label for="CEP">NUMERO CARTAO </label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Placeholder" id="CEP" type="text" class="validate">
                    <label for="CEP">NOME TITULAR </label>
                </div>

                <div class="input-field col s3">
                    <input placeholder="Placeholder" id="CEP" type="text" class="validate">
                    <label for="CEP">VENCIMENTO </label>
                </div>
            </div>

            <div class="col s12">
                <a class="btn btn-success btn-large" v-on:click="emitirPedido()">EMITIR PEDIDO</a>
            </div>

        </div>



</template>

<script>
    export default {
        props: [],
        data: function(){
            return {
                dadosPessoais : {
                    nome : '',
                    email: '',
                    cpfcnpj : '',
                    sobrenome : '',
                    cep : '',
                    endereco : '',
                    bairro : '',
                    numero : '',
                    complemento : '',
                    cidade : '',
                    estado : '',
                    rg : '',
                    ddd_cel : '',
                    celphone : ''
                },
                pagamento : {
                    tipo : '',
                    cartao : {
                        numero : '',
                        cvv : '',
                        nome : '',
                        vencimento : ''
                    }
                },
                dadosFaturamento : {
                    cep : '',
                    endereco : '',
                    bairro : '',
                    numero : '',
                    complemento : '',
                    cidade : '',
                    estado : ''
                },
            }
        },
        mounted() {

        },
        methods: {
            getCepPessoal(){
                axios.get('https://viacep.com.br/ws/'+this.dadosPessoais.cep+'/json/')
                    .then((data) => {
                        console.log(data.data);
                        this.dadosPessoais.endereco = data.data.logradouro;
                        this.dadosPessoais.bairro = data.data.bairro;
                        this.dadosPessoais.cidade = data.data.localidade;
                        this.dadosPessoais.estado = data.data.uf;
                    });
            },
            getCepFat(){
                axios.get('https://viacep.com.br/ws/'+this.dadosFaturamento.cep+'/json/')
                    .then((data) => {
                        console.log(data.data);
                        this.dadosFaturamento.endereco = data.data.logradouro;
                        this.dadosFaturamento.bairro = data.data.bairro;
                        this.dadosFaturamento.cidade = data.data.localidade;
                        this.dadosFaturamento.estado = data.data.uf;
                    });
            },
            emitirPedido(){
                axios.post('/api/carrinho/emitirPedido', {
                    dadosPessoais : this.dadosPessoais,
                    pagamento : this.pagamento,
                    dadosFaturamento : this.dadosFaturamento,
                })
                    .then((data) => {
                        console.log('sucesso');
                    }).catch((data) => {
                        console.log('error');
                });
            }
        }
    }
</script>
