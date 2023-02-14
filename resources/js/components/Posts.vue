<template>
    <div class="posts">
        <div v-for="post in posts" :key="post.id" class="posts__item">
            <a :href="post.image" class="image-link"><img :src="post.image_thumb"></a>
            <span v-if="post.author.email" >{{ post.author.email }}</span>
            <h3>{{ post.title }}</h3>
            <p>{{ post.description }}</p>
            <a v-if="userID" class="posts__button" v-on:click="favoriteAdd(post.id)"><i class="favorite"></i>{{ post.favorite_added.added }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                posts: null,
                isLoading: true,
                userID: null
            }
        },
        updated() {
            this.$nextTick(function () {
                $('.image-link').magnificPopup({type: 'image'});
            })
        },
        mounted() {
            if (this.user){
                this.userID = JSON.parse(this.user).id
            }
            axios.get('api/posts').then(response => (this.posts = response.data.data))
        },
        methods: {
            favoriteAdd(post_id, user_id) {
                axios.post('api/favorite/add',{post_id: post_id, user_id: this.userID}).then((response) => {
                    this.posts.map((el) => {
                        if (el.id === response.data.added.post_id){
                            el.favorite_added.added += 1
                        }
                    })
                })
            }
        }
    }
</script>
