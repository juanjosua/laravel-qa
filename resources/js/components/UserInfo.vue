<template>
  <div>
      <span class="text-muted">
          {{ postDate }}
      </span>
      <div class="media mt-2">
          <a :href="user.url" class="pr-2">
              <img :src="user.avatar" alt="User Avatar">
          </a>
          <div class="media-body mt-1">
              <a :href="user.url">{{ user.name }}</a>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    //props receive the list of attributes that are exposed to accept data
    //from the parent component, can be array or object
    //to use attribute outside <user-info model="..." label=""></user-info>
    props: ['model', 'label'],

    //extra logic that are cached and only re-computed when dependecies changed
    computed: {
        postDate() {
            return this.label + ' ' + this.model.created_date
        }
    },

    //to store component's state
    //simplyfy how we call model property
    data() {
        return {
            user: this.model.user
        }
    }
}
</script>
