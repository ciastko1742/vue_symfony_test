<template>
    <div class="item" :class="{ completed: item.completed }">
        <h2>{{ item.title }}</h2>
        <button @click="removeItem(item.id)" v-if="!item.completed">Zakończ</button>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        methods: {
            removeItem(){
                this.$emit('removeClicked', this.item.id)
            }
        }
    }
</script>
