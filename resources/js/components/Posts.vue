<template>
    <ul class="tiles-wrap" id="posts">
        <li v-for="post in posts" :key="post.id">
            <div class="post__image">
                <img :src="post.image_thumb" alt="">
            </div>
            <div class="post__title">
                <p>{{ post.title }}</p>
            </div>
            <div class="post__description">
                <p>{{ post.description }}</p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                posts: null
            }
        },
        mounted() {
            axios
                .get('api/posts')
                .then(response => (this.posts = response.data.data))
        }
    }
</script>
