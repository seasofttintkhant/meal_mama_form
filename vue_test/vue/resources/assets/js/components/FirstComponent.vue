<template>
    <div>
        <label>First Name</label>
        <span>{{first_name}}</span>
        <button @click="test">Test</button>
    </div>
</template>
<script>
    export default{
        data: function(){
            return {
                
            }
        },
        props: ["first_name"],
        methods: {
            test(){
                console.log(this.first_name);
            }
        }
    }
</script>