<template>
    <div class="ui container">
        <div id="content" class="ui basic segment">
            <h3 class="ui header">Serviços Providos</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Preço do Serviço</th>
                    <th scope="col">Cliente</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(serviceProvision, id) in laravelData.data" :key="id">
                    <th scope="row">{{id + 1}}</th>
                    <th>{{serviceProvision.provider.name}}</th>
                    <th>{{serviceProvision.service.name}}</th>
                    <th><input disabled v-money="money" v-model="serviceProvision.service.value" class="col-3"></th>
                    <th>{{serviceProvision.client_name}}</th>
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
    name: "ListServiceProvision",
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
            this.$http.get('/api/serviceProvision?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        }
    }
}

</script>

<style scoped>

</style>
