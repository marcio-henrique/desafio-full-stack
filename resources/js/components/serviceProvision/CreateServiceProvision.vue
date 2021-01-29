<template>
    <div>
        <h3>Criar Provisão de Serviço</h3>
        <p>Para cadastrar uma provisão de serviço, basta enviar um arquivo .csv para o link abaixo, com a seguinte estrutura (que deve estar presente na primeira linha do arquivo):</p>
        <ul>
            <li>nome_do_provedor,nome_do_serviço,nome_do_cliente</li>
        </ul>
        <div class="col-sm-10">
            <input type="file" @change="selectFile">
        </div><br>
        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
                <button @click="createServiceProvision" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateServiceProvision",
    data() {
        return {
            csv: {}
        }
    },
    methods: {
        selectFile(event) {
            this.csv = event.target.files[0];
        },
        createServiceProvision() {
            let formData = this.formAppend();
            this.dataSend(formData);
        },
        formAppend() {
            let formData = new FormData();
            formData.append('csv', this.csv)
            return formData;
        },
        dataSend(formData) {
            this.$http.post('/api/serviceProvision', formData).then((response) => {
                console.log(response.success);
                this.$router.push({ name: 'ListServiceProvision' });
            }).catch((error) => {
                console.log(error);
            });
        },

        addServiceRow(){
            this.services.push({name:"", value:""});
        },
        removeServiceRow(index){
            this.services.splice(index,1);
        },
    }
}
</script>

<style scoped>

</style>
