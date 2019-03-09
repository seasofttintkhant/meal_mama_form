<template>
    <div>
        <label for="">
            Last Name
        </label>
        <span>{{last_name}}</span>
    </div>
</template>

<script>
    export default{
        props: ["last_name"]
    }
</script>