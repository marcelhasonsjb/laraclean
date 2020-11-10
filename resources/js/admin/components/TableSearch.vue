<template>
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ nowcount }} of {{ count }}</strong> {{ resource }}s
                </p>
            </div>
            <div class="level-item">
                <div class="field has-addons">
                    <p class="control">
                        <input
                                class="input"
                                type="text"
                                :placeholder="'Find a ' + resource"
                                v-model="searchQuery"
                        >
                    </p>
                    <!--<p class="control">-->
                        <!--<button class="button">-->
                            <!--Search-->
                        <!--</button>-->
                    <!--</p>-->
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <!--<p class="level-item"><strong>All</strong></p>-->
            <!--<p class="level-item"><a>Published</a></p>-->
            <!--<p class="level-item"><a>Drafts</a></p>-->
            <!--<p class="level-item"><a>Deleted</a></p>-->
            <p class="level-item">
                <router-link :to="`/admin/${ resource }s/new`"
                   class="button is-success"
                >New {{ resource }}</router-link>
            </p>
        </div>
    </nav>
</template>

<script>
    export default {
        props: {
            count: {
                type: Number,
                default: 0
            },
            nowcount: {
                type: Number,
                default: 0
            },
            resource: {
                type: String
            }
        },
        data() {
            return {
                searchQuery: ''
            }
        },
        watch: {
            searchQuery(value) {
                this.$emit('searchQueryChanged', value)
            }
        }
    }
</script>

<style scoped>

</style>