<template>
    <div class="flex flex-col items-start ">
        <div class="flex items-center py-[14px]">
            <img class="rounded-full" :src="profileImage" alt="Profile Image" height="42" width="42" />
            <p class="pl-2">{{ user }}</p>
        </div>
        <div class="relative w-full overflow-hidden">
            <img v-if="postImage" :src="postImage" alt="Post Image" class="w-full object-cover" />
        </div>
        <div class="p-4 w-full">
            <p class="inline-block w-full">
                {{ isExpanded ? description : truncatedDescription }}
            </p>
            <button v-if="showToggleButton" @click="toggleShowMore" class="text-blue-500 mt-2">
                {{ isExpanded ? 'Mostrar menos' : 'Mostrar mais' }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isExpanded: false, // Estado para controlar se o texto está expandido ou não
        };
    },
    props: {
        description: {
            type: String,
            required: true,
        },
        user: String,
        profileImage: String,
        postImage: String,
    },
    computed: {
        truncatedDescription() {
            // Retornar os primeiros 50 caracteres, seguidos por reticências
            return this.description.length > 50 ? this.description.substring(0, 50) + '...' : this.description;
        },
        showToggleButton() {
            // Mostrar o botão "Mostrar mais" se o texto tiver mais de 50 caracteres
            return this.description.length > 50;
        },
    },
    methods: {
        toggleShowMore() {
            // Alternar entre expandir ou encurtar o texto
            this.isExpanded = !this.isExpanded;
        },
    },
};
</script>






<style sccs>
    @import "../../scss/post.scss";
</style>
