import './bootstrap';
import { createApp } from 'vue'
import Search from './src/components/Search.vue';
import PrimaryCard from './src/components/PrimaryCard.vue';

const app = createApp({})
app.component('search', Search)
app.component('primary-card', PrimaryCard)
app.mount('#app')