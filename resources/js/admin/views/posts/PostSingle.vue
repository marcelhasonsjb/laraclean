<template>
    <div>

        <h1 class="title">
            <small class="has-text-grey-light">post | </small>
            {{ post.title }}
        </h1>

        <div class="content" v-html="post.text">
        </div>
        <table class="table meta">
            <tr>
                <td><strong>id:</strong></td>
                <td> {{ post.id }} </td>
            </tr>
            <tr>
                <td><strong>slug:</strong></td>
                <td>
                    <input
                            type="text"
                            class="input"
                            :value="post.slug"
                            readonly
                    >
                </td>
            </tr>
            <tr>
                <td><strong>created at:</strong></td>
                <td> {{ post.created_at }} </td>
            </tr>
            <tr>
                <td><strong>updated at:</strong></td>
                <td> {{ post.updated_at }} </td>
            </tr>
        </table>

            <single-edit-links
                    resource="post"
                    :id="post.id"
            />




    </div>
</template>

<script>
    import SingleEditLinks from "../../components/SingleEditLinks"
    export default {
        data() {
            return {
                post: {}
            }
        },
        components: {
            SingleEditLinks
        },
        created() {
            axios.get('/api/posts/' + this.$route.params.id).then(response =>{
                this.post = response.data
            })
                .catch(error =>{
                    return this.$router.push('/admin/404')
                })
        }
    }
</script>

<style lang="scss" scoped>

</style>