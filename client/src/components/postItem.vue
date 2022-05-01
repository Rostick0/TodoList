<template>
    <div v-for="post in allPosts" :key="post.id" class="post card m-4">
    <h5 class="card-title">{{ post.title }}</h5>
    <p>{{ post.body }}</p>
    <button @click="deletePost(post.id)" class="btn btn-primary">Удалить</button>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex'

export default {
  name: 'Post',
  computed: mapGetters(['allPosts']),
  methods: {
    ...mapActions(['getPosts', 'asyncDeletePost']),
    ...mapMutations(['deletePost']),
    deletePost(id) {
      this.asyncDeletePost({
        id: id
      })
    },
  },
  async mounted() {
    this.getPosts()
  }
}
</script>

<style scoped>
  .posts {
    overflow-y: auto;
    max-height: 50vh;
    display: flex;
    flex-wrap: wrap;
  }

  .post {
    flex: 1 0 40%;
  }

  .card:nth-last-child(1) {
    margin-bottom: 0;
  }
</style>