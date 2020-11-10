<template>

    <div class="field is-grouped">
        <p class="control">
            <router-link
                    :to="`/admin/${resource}s/new`"
                    class="button is-success"
            >
                create new
            </router-link>
        </p>
        <p class="control">
            <router-link
                    :to="`/admin/${resource}s/${id}/edit`"
                    class="button is-info is-outlined"
            >
                <span class="icon"><i class="mdi mdi-pencil-outline"></i></span>
                &nbsp; edit {{ resource }}
            </router-link>
        </p>
        <p class="control">
            <a
                    @click="deleteResource"
                    class="button is-danger is-outlined"
            >
                <span class="icon"><i class="mdi mdi-trash-can-outline"></i></span>
                &nbsp; delete {{ resource }}
            </a>
        </p>
    </div>

</template>

<script>
    export default {
        props: ['resource', 'id'],
        methods: {
            deleteResource() {
                if (window.confirm("are you sure? there's no going back!")) {

             axios
                 .delete(`/api/${this.resource}s/${this.id}`)
                 .then(response => this.$router.push(`/admin/${this.resource}s`))

                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>