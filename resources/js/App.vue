<script>
    import Post from './components/Post.vue';
    export default {
        components: {
            Post
        }
    }
</script>

<template>
    <h1 class="text-white w-[100%] text-4xl bg-gradient-to-r from-purple-500 to-pink-500 mb-8">Feed</h1>

    <Post
        user="Caralho"
        :profile-image="'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3HTgKkm-tBcNbiLG5eCL12nOngY_fEta2BA&s'"
        :post-image="'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3HTgKkm-tBcNbiLG5eCL12nOngY_fEta2BA&s'"
        :description="'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat,eugiateugiateugiateugiateugiateugiateugiat vestibulum lorem nec, ultricies mi. Donec in velit in nunc ultricies condimentum. Nulla nec purus feugiat, vestibulum lorem nec, ultricies mi. Donec in velit in nunc ultricies condimendsfasdfasdfasdfasdfasdfadfasdfasdfastum.'"
    />
</template>

<style scoped>
@import "../scss/token.scss";
</style>
