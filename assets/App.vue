<template>
    <div>
        <h2>Test VUE.js</h2>
        <button class="btn btn-primary" @click="counter++">Click me - {{ counter }}</button>
        <div v-for="item in items" :key="item.id">
            <h2>{{ item.title }}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items: [
                    {title: 'Zakupy', completed: false, id: 1},
                    {title: 'Spacer', completed: false, id: 2},
                    {title: 'Al', completed: false, id: 3},
                ]
            }
        },
        methods: {
        }
    }
</script>

<style>

</style>