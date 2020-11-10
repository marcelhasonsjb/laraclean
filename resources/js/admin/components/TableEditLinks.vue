<template>
    <div>
        <router-link :to="`/admin/${resource}s/${id}`">
            <span class="icon"><i class="mdi mdi-eye-outline"></i></span>
        </router-link>
        <router-link :to="`/admin/${resource}s/${id}/edit`">
            <span class="icon"><i class="mdi mdi-pencil-outline"></i></span>
        </router-link>
        <a @click="deleteResource">
            <span class="icon"><i class="mdi mdi-trash-can-outline"></i></span>
        </a>
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
                        .then(response => this.$router.go())

                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    div {
        display: flex;
        justify-content: center;
    }
a {
    border: none;
}
</style>