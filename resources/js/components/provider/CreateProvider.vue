<template>
    <div class="container">
        <div>
            <form @submit.prevent="createProvider" method="post" id="contact_form">
                <div>
                    <div id="message" class="alert alert-danger alert-dismissible fade"></div>
                    <h3>Cadastro do Provedor</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Nome*:</label>
                        <div class="col-sm-10">
                            <input v-model="provider.name" required type="text" class="form-control" id="name" placeholder="Digite o nome" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-mail*:</label>
                        <div class="col-sm-10">
                            <input type="email" v-model="provider.email" required class="form-control" id="email" placeholder="Digite o email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phoneNumber">Telefone*:</label>
                        <div class="col-sm-10">
                            <input v-mask="phoneNumberMask" v-model="provider.phoneNumber" required type="text" class="form-control" id="phoneNumber" placeholder="Digite o número de telefone" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input v-model="officialDocument.type" required class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="CPF">
                            <label class="form-check-label" for="inlineRadio1">CPF</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="officialDocument.type" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="CNPJ">
                            <label class="form-check-label" for="inlineRadio2">CNPJ</label>
                        </div>
                        <div class="col-sm-10">
                            <input v-mask="getOfficialDocumentMask(officialDocument.type)" v-model="officialDocument.number" minlength="5" required :disabled="officialDocument.type === ''" type="text" class="form-control" id="officialDocumentNumber" placeholder="Digite o número do documento" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phoneNumber">Foto (opcional):</label>
                        <div class="col-sm-10">
                            <input type="file" @change="selectFile">
                        </div>
                    </div>
                    </div>
                    <h4>Serviços prestados</h4>

                    <div v-for="(service, id) in services" class="input-group col-sm-10">

                        <input
                            type="text"
                            v-model="service.name"
                            class="form-control col-sm-8"
                            required="true"
                            placeholder="Digite o nome do serviço"
                        >
                        <input
                            type="text"
                            v-model="service.value"
                            v-money="money"
                            class="form-control"
                            required="true"
                            placeholder="Digite o valor do serviço"
                        >
                        <span class="input-group-append"><a href="#" @click="removeServiceRow(id)" class="btn btn-danger">X</a></span>
                    </div>
                    <div class="input-group col-sm-10">
                        <a href="#" @click="addServiceRow" class="btn btn-default">Adicionar Serviço</a>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</template>

<script>
import maskMixin from "../../mixins/maskMixin";

export default {
    name: "CreateProvider",

    mixins: [maskMixin],

    data() {
        return {
            provider: {
                name: "",
                email: "",
                phoneNumber: "",
            },
            photo: "",
            officialDocument: {
                type: "",
                number: "",
            },
            services: []

        }
    },
    methods: {
        selectFile(event) {
            this.photo = event.target.files[0];
        },
        createProvider() {
            let formData = this.formAppend();
            this.dataSend(formData);
        },
        formAppend() {
            let formData = new FormData();
            formData.append('provider', JSON.stringify(this.provider))
            formData.append('officialDocument', JSON.stringify(this.officialDocument));
            formData.append('services', JSON.stringify(this.services));
            if (this.photo !== "") {
                formData.append('photo', this.photo);
            }
            return formData;
        },
        dataSend(formData) {
            this.$http.post('/api/provider', formData).then((response) => {
                console.log(response.success);
                this.$router.push({ name: 'ListProvider' });
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
