<template>
    <b-form class="my-3 mx-2">
        <b-form-input class="text-center my-3 my-2"
            type="text"
            v-model="querySearch"
            placeholder="Buscar en Messenger">
        </b-form-input>
    </b-form>
</template>

<script>
    export default {
        computed: {
           querySearch: {
               get () {
                    return this.$store.state.querySearch
                },
                set (value) {
                    this.$store.commit('newQuerySearch', value)
                }
           }
        }
    }
</script>