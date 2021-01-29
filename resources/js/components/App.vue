<template>
    <div>
        <nav-bar></nav-bar><br>
        <main>
            <router-view />
        </main>
    </div>
</template>

<script>
import NavBar from "./layout/NavBar";
export default {
    name: "App",
    components: {NavBar},
}
</script>

<style scoped>

</style>
