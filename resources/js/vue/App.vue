<template>
    <div class="todosAppContainer">
        <div class="heading">
            <h2 class="title">Todos App</h2>
             <add-item v-on:reloadList="getList()" />
        </div>
        <list-view :items="items" v-on:reloadList="getList()" />


    </div>
</template>

<script>
import AddItem from './AddItem'
import ListItem from './ListItem'
import ListView from './ListView'

export default {
   components:{
      AddItem,ListItem,ListView,

    },
    data: function(){
        return{
            items:[],
        }
    },
    methods:{
        getList(){
            axios.get('/api/items')
            .then( response => {
                this.items=response.data
                // console.log(response.data)
            })
            .catch( error=>{
                // console.log( error )
            })
        }
    },
    created(){
        this.getList();
    }

}
</script>

<style scoped>
.todosAppContainer{
    width :450px;
    margin: auto;
}
.heading{
    background: #e6e6e6;
    padding: 10px;
}
.title{
    text-align: center;
}
</style>
