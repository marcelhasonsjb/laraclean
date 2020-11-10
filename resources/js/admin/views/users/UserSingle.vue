<template>
    <div>

        <h1 class="title">
            <small class="has-text-grey-light">user</small>
            {{ user.name }}
        </h1>

        <div class="content">

            <div class="field has-addons">
                <div class="control">
                    <input class="input" type="text" placeholder="Please remember this" :value="token">
                </div>
                <div class="control">
                    <a class="button is-info" @click="renewToken">
                        Generate token
                    </a>
                </div>
            </div>

            <div v-if="token" class="notification is-warning">
                <strong>Please write this down</strong> We will literally show it only once.<br>
                We will not store this in the database.
            </div>

        </div>

    </div>
</template>

<script>

    export default {
        data() {
            return {
                user: {},
                token: ''
            }
        },
        created() {
            axios
                .get('/api/users/' + this.$route.params.id)
                .then(response => {
                this.user = response.data
            })
                .catch(error => {
                    return this.$router.push('/admin/404')
                })
        },
        methods: {
            renewToken() {
                this.token = '';

                axios.get('/renewToken').then(response =>{
                    this.token = response.data.token
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
div.control {
    width: 100%;
}
</style>