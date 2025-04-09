<template>
    <div class="card" style="width: 18rem; flex: 0 0 auto;">
        <img :src="imageUrl" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ title }}</h5>
            <p class="card-text">{{ price }}</p>
            <a :href="storeUrl" class="btn btn-danger" target="_blank">Открыть в магазине</a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['imageUrl', 'title', 'price', 'storeUrl'],
    data() {
        return {
            defaultImage: 'gays',
        }
    },
    mounted() {
    // Выводим значение imageUrl в консоль после монтирования компонента
    console.log(this.imageUrl); 
    console.log(this.title);
  },
};

</script>

<style scoped>
</style>