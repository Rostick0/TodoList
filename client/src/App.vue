<template>
  <MyForm />
  <Posts />
</template>

<script>
import Posts from '@/blocks/posts.vue'
import MyForm from '@/blocks/myForm.vue'

export default {
  methods: {
    deletePost(id) {
      this.posts = this.posts.filter(post => post.id !== id)
    }
  },
  components: {
    Posts,
    MyForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  padding: 30px;
}
</style>
