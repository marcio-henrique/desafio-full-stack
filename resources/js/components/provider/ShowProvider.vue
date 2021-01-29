<template>
    <div v-if="loaded">
        <div>
                <h3 class="col-sm-2">Provedor</h3>
                <div v-if="provider.photo_url != null">
                    <img :src='provider.photo_url' alt="foto do provedor" class="col-sm-2" width="200px" height="200px">
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome:</label>
                    <div class="col-sm-10">
                        <input disabled v-model="provider.name" required type="text" class="form-control" id="name" placeholder="Digite o nome" name="name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">E-mail:</label>
                    <div class="col-sm-10">
                        <input disabled type="email" v-model="provider.email" required class="form-control" id="email" placeholder="Digite o email" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="phoneNumber">Telefone:</label>
                    <div class="col-sm-10">
                        <input disabled v-mask="phoneNumberMask" v-model="provider.phone_number" required type="text" class="form-control" id="phoneNumber" placeholder="Digite o número de telefone" name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="officialDocumentNumber">{{provider.official_document.type}}:</label>
                    <div class="col-sm-10">
                        <input disabled v-mask="getOfficialDocumentMask(provider.official_document.type)" v-model="provider.official_document.number" type="text" class="form-control" id="officialDocumentNumber" placeholder="Digite o número do documento" name="phone">
                    </div>
                </div>

            </div>
        <div id="content" class="ui basic segment">
            <h4 class="ui header">Serviços</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(service, id) in laravelData.data" :key="id">
                    <th scope="row">{{id + 1}}</th>
                    <th>{{service.name}}</th>
                    <th><input disabled v-money="money" v-model="service.value" class="col-3"></th>

                    <th v-if="service.status === 'ativo'">
                        <button @click="updateStatus(service, 'suspenso')" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Ativo">Ativo</button>
                    </th>
                    <th v-else>
                        <button @click="updateStatus(service, 'ativo')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="suspenso">Suspenso</button>
                    </th>
                </tr>
                </tbody>
            </table>

            <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>

<script>
import Pagination from 'laravel-vue-pagination';
import maskMixin from "../../mixins/maskMixin";
export default {
    name: "ShowProvider",
    components: {
        Pagination
    },
    mixins: [maskMixin],
    data() {
        return {
            laravelData: {},
            provider: {},
            loaded: false
        }
    },
    created() {
        this.getProvider();
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            this.$http.get('/api/service/provider/'+ this.$route.params.id + '?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        },
        getProvider() {
            this.$http.get('/api/provider/' + this.$route.params.id).then(response => {
                this.provider = response.data;
                this.loaded = true;
            });
        },
        updateStatus(service, newStatus) {
            this.$http.patch('/api/service/updateStatus/' + service.id, {status: newStatus})
                .then(response => {
                    service.status = newStatus;
            });
        }
    }


}

</script>

<style scoped>

</style>
