import './bootstrap';
import './fileUploadListener';
import { createApp } from 'vue';

const app = createApp({});

import Posts from './components/Posts.vue';
import Favorite from './components/Favorite.vue';
app.component('posts', Posts);
app.component('favorite', Favorite)

app.mount('#app');
