<template>
    <div class="posts">
        <div v-for="favorite in favorites" :key="favorite.id" class="posts__item">
            <img :src="favorite.post.image_thumb">
            <span v-if="favorite.post.author.email" >{{ favorite.post.author.email }}</span>
            <h3>{{ favorite.post.title }}</h3>
            <p>{{ favorite.post.description }}</p>
            <a v-if="favorite.post.author.id" class="posts__button" v-on:click="favoriteDelete(favorite.id)"><i class="favorite"></i>{{ favorite.post.favorite_added.added }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                favorites: null,
            }
        },
        mounted() {
            axios.get('/api/favorite/1').then(response => (this.favorites = response.data)).then(() => {
                axios.get('/api/posts').then(responsePosts => {
                    responsePosts.data.data.map( (post) => {
                        this.favorites.map((el) => {
                            if (post.id === el.post.id){
                                el.post = post
                            }
                        })
                    })
                })
            })
        },
        methods: {
            favoriteDelete(post_id) {
                axios.post('api/favorite/delete',{post_id: post_id}).then((response) => {
                    console.log('Deleted')
                })
            }
        }
    }
</script>
