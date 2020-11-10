<template>
    <div>
        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input" :class="{ 'is-danger': errors.title}" type="text" placeholder="title" name="title" v-model="title">
            </div>
            <div v-if="errors.title">
                <p
                        class="help is-danger"
                        v-for="(error, index) in errors.title"
                        :key="index"
                >
                    {{ error }}
                </p>
            </div>
        </div>
        <div class="field">
            <label class="label">Slug</label>
            <div class="control">
                <input class="input" :class="{ 'is-danger': errors.slug}" type="text" placeholder="slug" name="slug" v-model="slug">
            </div>
            <div v-if="errors.slug">
                <p
                        class="help is-danger"
                        v-for="(error, index) in errors.slug"
                        :key="index"
                >
                    {{ error }}
                </p>
            </div>
        </div>
        <div class="field">
            <label class="label">Text</label>
            <div class="control content">
                <input id="x" :value="text" type="hidden" name="text" >
                <trix-editor
                        input="x"
                        :class="{ 'is-danger': errors.text}"
                ></trix-editor>
            </div>
            <div v-if="errors.text">
                <p
                        class="help is-danger"
                        v-for="(error, index) in errors.text"
                        :key="index"
                >
                    {{ error }}
                </p>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button @click="submitForm" class="button is-primary">Submit</button>
            </div>
            <div class="control">
                <button @click="$router.go(-1)" class="button is-text">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>

    import trix from 'trix'

    export default {
        props: ['errors', 'post'],
        data() {
            return {
                title: '',
                text: '',
                slug: ''
            }
        },
        mounted () {
            document.addEventListener('trix-change', () =>{
                this.text = document.getElementById('x').value
            })
        },
        methods: {
            submitForm() {
                let data = {
                    title: this.title,
                    slug: this.slug,
                    text: this.text,
                    user_id: 1,
                    status: 3,
                    mail_from: 'jaj@test.sk',
                    mail_date:''
                }
                this.$emit('post-form-submitted', data)
            }
        },
        watch: {
            title(value) {
                this.slug = _.trim(
                    _.deburr(value.toLowerCase())
                        .replace(/[^\w\s]/gi, '') //special characters
                        .replace(/ {2,}/g, ' ') //repeating spaces
                        .replace(/ /g, '-'), //spaces to -
                    '-'
                )
            },
            post(post) {
                    this.title = post.title
                    this.slug = post.slug
                    // this.text = post.text,

                        let trix = document.querySelector('trix-editor')
                        trix.editor.insertHTML(post.text)

                    this.user_id = 1
                    this.status = 3
                    this.mail_from = 'jaj@test.sk'
                    this.mail_date = ''
            }
        }
    }
</script>

<style scoped>
    @import '~trix/dist/trix.css';

    trix-editor {
        min-height: 18em;
    }
</style>