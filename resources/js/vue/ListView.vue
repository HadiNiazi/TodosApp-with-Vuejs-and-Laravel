<template>
    <div>
        <div v-for="item in items" :key="item.id">
            <list-item :item="item" v-on:itemChanged="$emit('reloadList')">
             </list-item >
        </div>
    </div>
</template>

<script>
import ListItem from './ListItem'
    export default {
        props:['items'],
        components:{ListItem},
    }

</script>

<style scoped>
.item{
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
