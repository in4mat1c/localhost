<template>
    <div class="p-3 shadow-lg rounded-4">
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
export default {
    data() {
        return {
            query: '', 
            disabled: false, 
        };
    },
    methods: {
      handleSearch() {
        if (this.query.trim() !== '') {
            console.log('Поиск для:', this.query);
            this.disabled = true;
            }
        },
    },
};
</script>
  
<style scoped>

</style>