<template>
    <div class="item">
            <input type="checkbox" v-model="completed" >
            <span :class="[ item.completed ? 'completed' : '','itemText' ]">{{ item.name }}</span>
            <button v-if="item.completed" class="completed-btn"><small><b>completed</b></small></button>
            <font-awesome-icon icon="tasks" v-else class="task" @click="taskCompleted"  />
            <button @click="removeItem" class="trashCan">
                <font-awesome-icon icon="trash" />
            </button>

    </div>
</template>

<script>
    export default {
        props:['item'],
        data:function(){
            return{
                completed:''
            }
        },
        methods:{

            removeItem(){
                axios.delete('/api/items/'+ this.item.id)
                .then( response=> {
                    if(response.status==200){
                        this.$emit('itemChanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                } )
            },
            taskCompleted(){
                axios.put('/api/items/'+ this.item.id)
                .then( response => {
                    if(response.status==200){
                        this.$emit('itemChanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                } )
            }
        }
    }

</script>

<style scoped>
.completed{
    color: #9999;
    text-decoration: line-through;
}
.itemText{
    width: 100%;
    margin-left: 20px;
}
.item{
    display: flex;
    justify-content: center;
    align-items: center;
}
.trashCan{
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}
.task{
    color: #be4bdb;
}
.pending{
    color: black;
}
.completed-btn{
    background-color: green;
    width: 70px;
    height: 25px;
    border-radius: 6px;
}
</style>
