<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <table>
            <tr>
                <th></th>
            </tr>
            <tr v-for="employer in employers">
                <td>@{{employer.name }}</td>
            </tr>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
var app = new Vue({
  el: '#app',
    data: {
        employers: []
    },
    created : function(){
        this.fetchEmployers();
    },
    methods:{
        fetchEmployers() {
            fetch('/api/employers')
            .then(res => res.json())
            .then(res=>{
                console.log(res);
                this.employers = res;
                console.log(this.employers);
            })
            .catch(err => console.log(err));
        },
    }
})
</script>

</body>
</html>