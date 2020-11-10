<template>
    <div>

        <h1 class="title">
            <small class="has-text-grey-light">comment</small>
        </h1>
        {{ $route.params }}


        <div class="content">
            {{ comment.text }}
        </div>
        <table class="table meta">

            <tr>
                <td><strong>post:</strong></td>
                <td>
                    <a :href="`/admin/posts/${comment.post_id}`">
                        {{ comment.post.title }}
                    </a>
                </td>
            </tr>

            <tr>
                <td><strong>user:</strong></td>
                <td>
                    <a :href="`/admin/users/${comment.user_id}`">
                        {{ comment.user.name }}
                    </a>
                </td>
            </tr>

            <tr>
                <td><strong>id:</strong></td>
                <td> {{ comment.id }} </td>
            </tr>

            <tr>
                <td><strong>created at:</strong></td>
                <td> {{ comment.created_at }} </td>
            </tr>

            <tr>
                <td><strong>updated at:</strong></td>
                <td> {{ comment.updated_at }} </td>
            </tr>

        </table>

            <single-edit-links
                    resource="comment"
                    :id="comment.id"
            />




    </div>
</template>

<script>
    import SingleEditLinks from "../../components/SingleEditLinks"
    export default {
        data() {
            return {
                comment: {
                    user: {},
                    post: {}
                }
            }
        },
        components: {
            SingleEditLinks
        },
        created() {
            axios.get('/api/comments/' + this.$route.params.id).then(response =>{
                this.comment = response.data
            })
                .catch(error => {
                    return this.$router.push('/admin/404')
                })
        }
    }
</script>

<style lang="scss" scoped>

</style>