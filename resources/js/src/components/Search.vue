<template>
    <div class="p-3 shadow-lg rounded-4 w-50">
        <input
        type="text"
        class="form-control"
        v-model="query"
        :disabled="disabled"
        @keyup.enter="handleSearch"
        placeholder="Поиск..."
        />
    </div>
    <div v-if="loading" class="loader"></div>

</template>
  
<script>
import axios from 'axios';

export default {
    data() {
        return {
            query: '', 
            disabled: false, 
            loading: false,
        };
    },
    methods: {
      async handleSearch() {
        if (this.query.trim() !== '') {
            this.disabled = true;
            this.loading = true; 

            try {
                await axios.post('/save-search-history', {
                    query: this.query, 
                }, {
                    withCredentials: true
                });

                const response = await axios.get('/api/search', {
                    params: {
                        q: this.query,
                    },
                });

                const history = await axios.get('/search-history-data', {
                    withCredentials: true
                });

                this.$emit('search', response.data.cards, history);
            } catch (error) {
                console.error('Error fetching search results:', error);
            } finally {
                this.disabled = false;
                this.loading = false;
            }
            }      
        },
    },
};
</script>
  
<style scoped>
.loader {
  border: 4px solid #f3f3f3;       /* светлая обводка */
  border-top: 4px solid #3498db;   /* синяя верхняя часть */
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 1s linear infinite;
  margin: auto;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
