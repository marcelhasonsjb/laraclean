
import Vue from 'vue'
import Router from 'vue-router'


// views
import Dashboard from './views/Dashboard.vue'
import NotFound from './views/NotFound.vue'

//posts
import Posts from './views/posts/Posts.vue'
import PostSingle from './views/posts/PostSingle.vue'
import PostCreate from './views/posts/PostCreate.vue'
import PostEdit from './views/posts/PostEdit.vue'

//comments
import Comments from './views/comments/Comments.vue'
import CommentSingle from './views/comments/CommentSingle.vue'

//users
import Users from './views/users/Users.vue'
import UserSingle from './views/users/UserSingle.vue'



Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/admin/',
            component: Dashboard
        },
        {
            path: '/admin/posts',
            component: Posts
        },
        {
            path: '/admin/posts/new',
            component: PostCreate
        },
        {
            path: '/admin/posts/:id',
            component: PostSingle
        },
        {
            path: '/admin/posts/:id/edit',
            component: PostEdit
        },

        //COMMENTS
        {
            path: '/admin/comments',
            component: Comments
        },
        {
            path: '/admin/comments/:id',
            component: CommentSingle
        },

        //USERS
        {
            path: '/admin/users',
            component: Users
        },
        {
            path: '/admin/users/:id',
            component: UserSingle
        },

        //404
        {
            path: '/admin/404',
            component: NotFound
        },
        {
            path: '*',
            redirect: '/admin/404'
        }
    ]
})