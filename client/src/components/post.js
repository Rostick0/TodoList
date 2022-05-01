import axios from "axios"

const jsonUrl = `http://json/posts/`

export default {
    actions: {
        async getPosts(ctx) {
            axios.get(jsonUrl)
                .then(response => ctx.commit('setPosts', response.data))
                .catch(error => console.error(error))
        },
        async asyncCreatePost(ctx, newPost) {
            ctx.commit('createPost', newPost)

            const data = new FormData();

            data.append('id', newPost.id)
            data.append('title', newPost.title)
            data.append('body', newPost.body)

            return axios.post(jsonUrl, data)
                    .catch(error => console.error(error))
        },
        async asyncDeletePost(ctx, post) {
            ctx.commit('deletePost', post)

            return axios.delete(`${jsonUrl}/${post.id}`)
                    .catch(error => console.error(error))
        }
    },
    mutations: {
        setPosts(state, posts) {
            state.posts = posts
        },
        createPost(state, newPost) {
            state.posts.push(newPost)
        },
        deletePost(state, post) {
            state.posts = state.posts.filter(posts => post.id !== posts.id)
        }
    },
    state: {
        posts: [],
    },
    getters: {
        allPosts(state) {
            return state.posts
        }
    }
}