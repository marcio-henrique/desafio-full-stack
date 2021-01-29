<template>
    <div class="ui container">
        <div id="content" class="ui basic segment">
            <h3 class="ui header">Provedores</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Número do telefone</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">Número do Documento</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="(provider, id) in laravelData.data" :key="id">
                        <th scope="row">{{id + 1}}</th>
                        <th>{{provider.name}}</th>
                        <th>{{provider.email}}</th>
                        <th>{{provider.phone_number | VMask(phoneNumberMask)}}</th>
                        <th>{{provider.official_document.type }}</th>
                        <th>{{provider.official_document.number | VMask(getOfficialDocumentMask(provider.official_document.type))}}</th>
                        <th>
                            <ul >
                                <li class="list-inline-item">
                                    <router-link :to="{name: 'ShowProvider', params:{id: provider.id}}" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="fa fa-table"></i></router-link>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></button>
                                </li>
                            </ul>
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
    name: "ListProvider",
    components: {
        Pagination
    },
    mixins: [maskMixin],
    created() {
        this.getResults();
    },
    data() {
        return {
            laravelData: {}
        }
    },
    methods: {
        getResults(page = 1) {
            this.$http.get('/api/provider?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
