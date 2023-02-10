<template>
    <div class="posts">
        <div v-for="post in posts" :key="post.id" class="posts__item">
            <img :src="post.image_thumb">
            <span v-if="post.author.email" >{{ post.author.email }}</span>
            <h3>{{ post.title }}</h3>
            <p>{{ post.description }}</p>
            <a v-if="post.author.id" class="posts__button" v-on:click="favoriteAdd(post.id, post.author.id)"><i class="favorite"></i>{{ post.favorite_added.added }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: null,
                isLoading: true
            }
        },
        mounted() {
            axios.get('api/posts').then(response => (this.posts = response.data.data))
        },
        methods: {
            favoriteAdd(post_id, user_id) {
                axios.post('api/favorite/add',{post_id: post_id,user_id: user_id}).then((response) => {
                    this.posts.map((el) => {
                        el.favorite_added.added += response.data.added.added
                    })
                })
            }
        }
    }
</script>
