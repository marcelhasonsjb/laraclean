<template>
    <section class="posts-page">
        <!--<h1 class="title is-4">posts</h1>-->

        <table-search
                :count="data.length"
                :nowcount="filteredItems.length"
                resource="post"
                @searchQueryChanged="search = $event"/>
        <!--<p class="field">-->
        <!--<input type="text" class="input" placeholder="find..." v-model="search">-->
        <!--</p>-->

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>user</th>
                <th>published at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in filteredItems" :key="post.id">
                <td>{{ post.id }}</td>
                <td>
                    {{ post.title }}
                    <small> {{ shorten(post.text) }}</small>
                </td>
                <td class="nowrap">
                    <a :href="'/admin/users/' + post.user.id">
                        {{ post.user.name }}
                    </a>
                </td>
                <td>{{ niceDate(post.created_at) }}</td>
                <td>
                    <table-edit-links
                    resource="post"
                    :id="post.id"/>
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
                searchColumn: 'title'
            }
        },
        mixins: [tableMixin],
        components: {
            TableSearch,
            TableEditLinks
        },

        created() {
        axios.get('/api/posts').then(response => {
        this.data = response.data
    })
        },

    }
</script>

<style lang="scss" scoped>
small {
    font-size: 75%;
    color: #afafaf;
}
</style>
