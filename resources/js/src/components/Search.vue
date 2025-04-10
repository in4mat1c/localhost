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
</template>
  
<script>
import axios from 'axios';

export default {
    data() {
        return {
            query: '', 
            disabled: false, 
        };
    },
    methods: {
      async handleSearch() {
        if (this.query.trim() !== '') {
            this.disabled = true;

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
            }
            }      
        },
    },
};
</script>
  
<style scoped>

</style>