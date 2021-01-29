<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Empresa do Seu João</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Provedores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <router-link :to="{name: 'ListProvider'}" class="dropdown-item" href="#">Lista de provedores</router-link>
                        <router-link :to="{name: 'CreateProvider'}" class="dropdown-item" href="#">Criar Provedor</router-link>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Serviços Providos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{name: 'ListServiceProvision'}" class="dropdown-item" href="#">Lista de serviços providos</router-link>
                        <router-link :to="{name: 'CreateServiceProvision'}" class="dropdown-item" href="#">Criar serviços providos</router-link>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
name: "NavBar"
}
</script>

<style scoped>

</style>
