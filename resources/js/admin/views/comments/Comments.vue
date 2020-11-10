<template>
    <section class="comments-page">
        <table-search
                :count="data.length"
                :nowcount="filteredItems.length"
                resource="comment"
                @searchQueryChanged="search = $event"/>

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
            <tr>
                <th>id</th>
                <th>text</th>
                <th>post</th>
                <th>user</th>
                <th>published at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="comment in filteredItems"
                :key="comment.id">
                <td>{{ comment.id }}</td>
                <td>
                    <small>{{ shorten(comment.text) }}</small>
                </td>
                <td class="nowrap">
                    <a :href="'/admin/posts/' + comment.post_id">
                        {{ comment.post_id }} <strong>➜</strong>
                    </a>
                </td>
                <td>
                    <a :href="'/admin/users/' + comment.user.id">
                        {{ comment.user.name }}
                    </a>
                </td>
                <td>{{ niceDate(comment.created_at) }}</td>
                <td>
                    <table-edit-links
                            resource="comment"
                            :id="comment.id"/>
                </td>
            </tr>
            </tbody>
        </table>

    </section>
</template>

<script>
    import tableMixin from '../../mixins/tableMixin'
    import TableSearch from '../../components/TableSearch.vue'
    import TableEditLinks from '../../components/TableEditLinks.vue'


    export default {
        data() {
            return{
                searchColumn: 'text'
            }
        },
       mixins: [tableMixin],
        components: {
            TableSearch,
            TableEditLinks
        },

        created() {
            axios.get('/api/comments').then(response => {
                this.data = response.data
            })
        },
    }
</script>

<style lang="scss" scoped>
small {
    font-size: 85%;
}
</style>