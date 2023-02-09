<template>
    <div class="posts">
        <div v-for="post in posts" :key="post.id" class="posts__item">
            <img :src="post.image_thumb">
            <h3>{{ post.title }}</h3>
            <p>{{ post.description }}</p>
            <a class="posts__button" v-on:click="favoriteAdd(post.id)"><i class="favorite"></i>aaa</a>
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
            axios
                .get('api/posts')
                .then(response => (this.posts = response.data.data))
        },
        methods:{
            favoriteAdd: (id) => {
                console.log(id)
            }
        }
    }
</script>
