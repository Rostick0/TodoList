<template>
  <div class="posts">
    <PostItem />
  </div>
</template>

<script>
import PostItem from '@/components/postItem'

export default {
  components: {
    PostItem
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