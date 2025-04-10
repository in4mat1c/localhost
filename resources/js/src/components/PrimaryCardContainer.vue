<template>
    <div class="primary-card-container shadow-lg rounded-4 p-3 mb-3">
        <div class="text-center mb-3 d-flex justify-content-center align-items-center gap-2">
            <img :src="service_image" alt="kaspi" style="width: 20px; height: 20px;">
            <span class="fw-bold">{{ service_name }}</span>
        </div>
    
        <div class="d-flex flex-row align-items-center overflow-auto gap-3" style="flex-wrap: nowrap; white-space: nowrap;">
            <primary-card
            v-for="(card, index) in cards"
            :key="index"
            :image_link="card.imageUrl"
            :title="card.title"
            :price="card.price"
            :store_link="card.storeUrl"
            ></primary-card>
        </div>
    </div>
</template>
  
<script>

import PrimaryCard from './PrimaryCard.vue';
export default {
    components: {
       PrimaryCard
    },
    props: ['cards', 'service_name', 'service_image'],
    mounted() {
        // Проверяем данные, которые пришли в пропс cards
        console.log('Cards prop:', this.cards);
        
    }
};
</script>

<style>
</style>