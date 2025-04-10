import './bootstrap';
import { createApp } from 'vue'
import Search from './src/components/Search.vue';
import PrimaryCardContainer from './src/components/PrimaryCardContainer.vue';
import PrimaryHistoryCard from './src/components/PrimaryHistoryCard.vue';

const app = createApp({
    data() {
        return {
            cards: [],
            history: [],
        };
    },
    methods: {
        updateCards(data, history) {
            this.cards = data;
            this.history = history.data;
        },
        async fetchHistory() {
            try {
                const response = await axios.get('/search-history-data', {
                    withCredentials: true
                });
                this.history = response.data;  
            } catch (error) {
                console.error('Ошибка при загрузке истории:', error);
            }
            },
        },
        created() {
            this.fetchHistory();  
        },
});

app.component('search', Search)
app.component('primary-card-container', PrimaryCardContainer)
app.component('primary-history-card', PrimaryHistoryCard)
app.mount('#app')