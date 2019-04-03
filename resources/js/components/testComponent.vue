<template>
    <div class="container">
        <h1>liste</h1>
        <div v-for="perso in tab">
            {{perso.name}}
        </div>

    </div>
</template>

<script>
    import $ from 'jquery'
    export default {
        name: "testComponent",
        data: function () {
            return{
                tab:[],
                api:""
            }
        },
        methods:{
            takeTen: function () {
                var self = this;
                var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
                $.getJSON(urlapi, function (data) {
                    self.api=data;
                    var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeTen&off=0";
                    $.getJSON(url, function (data) {
                        self.tab=data;
                        console.log(data);
                    });
                });
            }
        },
        mounted() {
            this.takeTen();


        }
    }

</script>

<style scoped>

</style>
