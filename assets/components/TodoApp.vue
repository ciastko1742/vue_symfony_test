<template>
    <div>
        <div class="item">
            <p>tekst: {{ newItem }}</p>
        </div>
        <input type="text" placeholder="todo" v-model="newItem">
        <button class="btn" @click="addItem">Dodaj</button>

        <TodoItem v-for="item in items" :key="item.id" :item="item" @removeClicked="removeItem"/>

    </div>
</template>

<script>
    import TodoItem from './TodoItem.vue'

    export default {
        components : {
            TodoItem
        },
        data(){
            return {
                newItem: '',
                items: [
                    {title: 'test1', completed: false, id: 1},
                    {title: 'test2', completed: true, id: 2},
                    {title: 'test3', completed: false, id: 3},
                ]
            }
        },
        methods: {
            addItem(){
                this.items.push({title: this.newItem, completed: false, id: Math.random()});
                this.newItem = '';
            },
            removeItem(id){
                var index = this.items.findIndex(el => el.id === id);
                this.items[index].completed = true;
            }
        }
    }
</script>

<style>
    .item {
        border: 1px solid #cdcdcd;
        padding: 10px;
        margin: 2px;
    }

    .completed {
        opacity: 0.2;
        text-decoration: line-through;
    }
</style>