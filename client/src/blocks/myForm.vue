<template>
  <form @submit.prevent="create" onsubmit="return false;">
      <div class="mb-3">
          <label for="title">Заголовок</label>
          <input type="text" v-model="title" class="form-control" id="title">
      </div>
      <div class="mb-3">
          <label for="description">Описание</label>
          <input type="text" v-model="body" class="form-control" id="description">
      </div>
      <p>
          <button :click="create" type="submit" class="btn btn-primary">Создать</button>
      </p>
  </form>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
    data() {
        return {
            title: '',
            body: ''
        }
    },
    computed: mapGetters(['allPosts']),
    methods: {
        ...mapMutations(['createPost']),
        ...mapActions(['asyncCreatePost']),
        create() {
            let lastId = 0
            try {
                lastId = this.allPosts[this.allPosts.length -1 ].id
            } catch {
                lastId = 0
            }

            this.asyncCreatePost({
                id: +lastId + 1,
                title: this.title,
                body: this.body
            })

            this.title = this.body = ''
        }
    }
}
</script>

<style scoped>
    form {
        margin: 0 auto;
        max-width: 30vh;
    }
</style>