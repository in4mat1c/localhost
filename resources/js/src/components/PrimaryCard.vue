<template>
    <div class="card" style="width: 14rem; height: 20rem; flex: 0 0 auto;">
        <img :src="image_link || defaultImage" class="card-img-top" :alt="text" style="object-fit: contain; height: 10rem; width: 100%;">
        <div class="card-body" style="display: flex; flex-direction: column; height: 10rem; padding: 1rem; justify-content: space-between; overflow: hidden;">
            <h5 class="card-title" style="white-space: normal; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; flex-grow: 1; max-height: 5rem;">
                {{ title }}
            </h5>
            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; margin-bottom: 0.5rem; flex-shrink: 0; max-height: 3rem;">
                {{ price }}
            </p>
            <a :href="store_link" class="btn btn-danger" target="_blank" style="flex-shrink: 0; height: 2.5rem;">Открыть в магазине</a>
        </div>
    </div>
</template>
<script>
export default {
    props: ['image_link', 'title', 'price', 'store_link', 'text'],
    data() {
        return {
            defaultImage: 'public/images/no-photo.jpg',
        }
    },
};

</script>

<style scoped>
</style>